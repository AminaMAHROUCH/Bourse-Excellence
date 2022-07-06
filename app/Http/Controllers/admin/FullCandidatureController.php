<?php

namespace App\Http\Controllers\admin;

use App\Exports\PanierExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FullCandidature ;
use App\Models\Intermediaire;
use App\Models\User;
use App\Models\Paiment;
use App\Models\Student;
use App\Models\Panier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use Carbon\Carbon;

class FullCandidatureController extends Controller
{
    
    public function index(){
        $paniers= Panier::get()->sortBy('id');
        $paiments=Paiment::get();
        return view('admin.pages.paiement.paiement', compact('paniers', 'paiments')) ; 
    }
  
    //add to intemidiare
    public function panier(Request $request)
    {
       
        $ids = $request->input('row'); 
        if(count((array)$ids)>0){
            $etudiantBoursiers= FullCandidature::whereIn('id', $ids)->select('*')->get(); 

            foreach ($etudiantBoursiers as $et) { 
                ////Date a modifier
                $anne= FullCandidature::where('cni', $et->cni)->first();
                
                Intermediaire::create([
                    'nom_prenom' => $et->nom_prenom ,
                    'cni' => $et->cni ,
                    'rib' => $et->rib ,
                    'anne_universitaire' => $anne->anne_universitaire,// a modifier
                    'promotion' => $anne->promotion

                ]) ;  
                
            }
        }else{
            return redirect()->back()->withErrors(['الرجاء تحديد مرشح واحد على الأقل']);;
        }

      return redirect('boursier/liste');
    }
     //add to intemidiare
     public function addPanier(Request $request)
     {
        $code= $request->code;
         $ids = $request->input('row');  
         if(count((array)$ids)>0){
             $etudiantBoursiers= FullCandidature::whereIn('id', $ids)->get(); 
             
             foreach ($etudiantBoursiers as $et) { 
                $inter= Intermediaire::create([
                     'nom_prenom' => $et->nom_prenom ,
                     'cni' => $et->cni ,
                     'rib' => $et->rib ,
                     'anne_universitaire' => $et->anne_universitaire ,
                     'code' => $code ,
                     
                 ]) ;  
                 
             }
         }else{
             return redirect()->back()->withErrors(['الرجاء تحديد مرشح واحد على الأقل']);;
         }
 
       return back();
     }

    //add to panier
    public function sendToPanier($type)
    {
        
            if($type==350){
                $intermidiares= Intermediaire::where('rib', 'like', '350%')->get();
                $in= Intermediaire::where('rib', 'like', '350%')->first();
             }else{
                $intermidiares= Intermediaire::where('rib', '!=', '350%')->get();
                $in= Intermediaire::where('rib', '!=', '350%')->first();

            }
            $p= Panier::latest()->first();
            if(!$p){
               $number=1;
            }else{
    
                $number= ($p->id);
            }
            
            $filename = $number.'_panier.csv';
            $file_xlsx = $number.'_panier.xlsx';
            $file_pdf = $number.'_panier.pdf';
             Excel::store(new PanierExport($type), $filename, 'public'); 
             Excel::store(new PanierExport($type), $file_xlsx, 'public'); 
             Excel::store(new PanierExport($type), $file_pdf, 'public'); 
          
            $file = storage_path('app/public' .  $filename, \Maatwebsite\Excel\Excel::CSV, [
                "Content-type"        => "text/csv",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
    
          ]);
            $panier= new Panier();
            $panier->num_panier=date('Ymd').'BRSE'.$number;
            $panier->date_creation=now();
            $panier->listes=$filename;
            $panier->file_xlsx=$file_xlsx;
            $panier->file_pdf=$file_pdf;
            $panier->etat='مفتوحة';
            $panier->code= count($intermidiares);
            $panier->type= $type;
            $panier->anne_universitaire= $in->anne_universitaire;
            $panier->promotion= $in->promotion;

            $panier->save();
    
           //add code to table intermidiare 
         
          foreach($intermidiares as $intermidiar){
              $intermidiar->code = $panier->num_panier;
              $intermidiar->save();
          }
    
            return redirect('boursier/finance');
    }

    //cloture panier
    public function close(Request $request, $id){
        //return $id;
       // DB::table('be_paniers')->where('id', $id)->update(['etat'=> 'مغلوقة']);
       $panier= Panier::find($id);
        $panier->etat= "مغلوقة";
        $panier->save();
        $intermidiare= Intermediaire::where('code', $panier->num_panier)->sum('montant');

        // //insert into table payment
        $paiment= new Paiment();
        $paiment->numero_panier= $panier->num_panier;
        $paiment->etat= 'لم ترفع بعد';
        $paiment->demande= $panier->listes;
        $paiment->total= $intermidiare;
        $paiment->anne_universitaire= $panier->anne_universitaire;
        $paiment->promotion= $panier->promotion;
        $paiment->save();
        //deletee from table intermidiare
        if($panier->type==350){
            $intermidiaires= Intermediaire::where('rib', 'like', '350%')->get();
         }else{
            $intermidiaires= Intermediaire::where('rib', '!=', '350%')->get();
        } 
        foreach ($intermidiaires as $et) { 
          $et->delete();    
        }
        return redirect('boursier/finance');
    }

    //delete from table intermidiare
    public function destroy(Request $request, $id){
        $intermidiare= Intermediaire::find($id);
        $intermidiare->delete();
        return back();
    }

    //update panier
    public function editPanier($id){
        $panier= Panier::find($id);
        $intermidiaires=Intermediaire::where('code', $panier->num_panier)->get();
        $fullCandidatures= FullCandidature::get();
        return view('admin.pages.paiement.editPanier', compact('panier', 'intermidiaires', 'fullCandidatures'));

    }

    //supprimer 
    public function delete(Request $request){

        $ids = $request->input('supprimer');  
        if(count((array)$ids)>0){
            $intermidiaires= Intermediaire::whereIn('id', $ids)->get(); 
            foreach ($intermidiaires as $et) { 
              $et->delete();    
            }
        }else{
            return redirect()->back()->withErrors(['الرجاء تحديد مرشح واحد على الأقل']);;
        }

      return back();

    }

    public function updatePanier($id){
        $panier= Panier::find($id);
        File::delete('storage/'.$panier->listes);
        File::delete('storage/'.$panier->file_xlsx);
        File::delete('storage/'.$panier->file_pdf);
        if($panier->type==350){
            $filename1 = $panier->id.'_panier.csv';
            $file_xlsx1 = $panier->id.'_panier.xlsx';
            $file_pdf1 = $panier->id.'_panier.pdf';
            //Excel::store(new PanierExport($panier->num_panier), $filename1, 'public'); 

            Excel::store(new PanierExport($panier->type), $filename1, 'public'); 
            Excel::store(new PanierExport($panier->type), $file_xlsx1, 'public'); 
            Excel::store(new PanierExport($panier->type), $file_pdf1, 'public'); 
         }elseif($panier->type!=350){
            $filename1 = $panier->id.'_panier.csv';
            $file_xlsx1 = $panier->id.'_panier.xlsx';
            $file_pdf1 = $panier->id.'_panier.pdf';
            //Excel::store(new PanierExport($panier->num_panier), $filename1, 'public'); 

            Excel::store(new PanierExport($panier->type), $filename1, 'public'); 
            Excel::store(new PanierExport($panier->type), $file_xlsx1, 'public'); 
            Excel::store(new PanierExport($panier->type), $file_pdf1, 'public'); 
        }
        if($panier->type==350){
            $intermidiares= Intermediaire::where('rib', 'like', '350%')->get();
         }else{
            $intermidiares= Intermediaire::where('rib', '!=', '350%')->get();
        }
        // DB::table('be_paniers')->where('id', $id)->update([
        //     'listes'=> $filename1,
        //     'file_xlsx'=> $file_xlsx1,
        //     'file_pdf'=> $file_pdf1,
        //     'code'=>  count($intermidiares),   
        // ]);
        $panier->listes=$filename1;
        $panier->file_xlsx=$file_xlsx1;
        $panier->file_pdf=$file_pdf1;
        $panier->code= count($intermidiares);
        $panier->save();
        return redirect('boursier/finance');
    }

    //add montant
    public function addMonatnt(Request $request)
    {      
        $monatnt= $request->montant;
        $intermidiaires= Intermediaire::all();
        foreach($intermidiaires as $intermidiar){
            $intermidiar->montant = $monatnt;
            $intermidiar->save();
        }
        return back();
    }

    public function addFile($id, Request $request){
        $paiment=DB::table('be_paiments')->where('id', $id)->update([
            'date_creation'=> date('Y/m/d H:i:s'),
            'date_panier'=> date('Y/m/d'), 
            'compte_debiter'=> $request->input('compte_debiter'),
            'intitule_compte'=> $request->input('intitule_compte'),
            'numero_operation'=> $request->input('numero_operation'),
            'user_name'=>  Auth::user()->name,  
        ]);
        //dd($paiment);
    
        return back();
    }

    public function addAvisSort($id, Request $request)
    {
            $paiment = Paiment::find($id);
            $dateC= Carbon::now()->format('Y-m-d');
            $name= 'SORT_'.$dateC.'_'.$paiment->numero_panier.'_'.$paiment->total.'_'.$paiment->numero_operation.'.csv';
            $avis_sort = $request->file('avis_sort'); 
            $new_name = $name . '.' . $avis_sort->getClientOriginalExtension();
            $filr=$avis_sort->move(public_path('avisSort'), $new_name);
            $paiment->detail  = $new_name;
            $paiment->save();
            

            $file = public_path('avisSort/'.$paiment->detail);
            $data = Helper::csvToArray($file);
            $paimentHistories = collect($data)->map(function ($paimentItem, $key){
                return [        
                    "Compte à créditer" => $paimentItem["Compte à créditer"],
                    "Statut" => $paimentItem["Status"],
                    "Raison du non paiement" => $paimentItem["Raison du non paiement"],
                ];
            });
         $nombre= $paimentHistories->count();
          if($nombre>0){
                for($i= 0;$i<$nombre; $i++ ){
                   $ribPaye= $paimentHistories[$i]['cni'];
                    $etudiantPaye= FullCandidature::where('cni', $ribPaye)->first();
                    $etudiantPaye->status= $paimentHistories[$i]['Statut'];
                    $etudiantPaye->RaisonNonPaiment= $paimentHistories[$i]['Raison du non paiement'];
                    $etudiantPaye->save();
                }
          }
            $rejete= $paimentHistories->where("Statut", "REJETE")->count();

            $paye=$paimentHistories->where("Statut", "PAYE")->count();

        return redirect('boursier/finance')->with(['paye' => $paye, 'rejete' => $rejete]);
    }

   


    public function annulerPanier($id, Request $request)
    {
        
        $paiment = Paiment::find($id);
        $paiment->description=$request->input('description');
        $paiment->save();
        //insert into table intermidiare
        $header = null;
        $file = storage_path('app/public/'.$paiment->demande);
        
        if(($handle = fopen($file, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ',', '"')) !== FALSE) {
                if (!$header) {
                    $header = $data;
                } else {
                    //$data = explode(',', $data);
                    $anne= FullCandidature::where('cni', $data[3])->select('anne_universitaire', 'promotion')->first();
                    //return $anne->anne_universitaire ; 
                    Intermediaire::create([
                        'nom_prenom' => trim($data[1], '"'),
                        'rib' =>  trim($data[0], '"'),
                        'montant' =>  trim($data[2], '"'),
                        'cin' =>  trim($data[3], '"'),
                        'anne_universitaire' => $anne->anne_universitaire,
                        'promotion' => $anne->promotion,
                    ]);
                }
            }
            fclose($handle);
        }
        return back();
    }


    public function downloadFile($id, Request $request)
    {
        //return 123;
        $paiment= Paiment::find($id);
        $paiment->markAsPaid();
        $paimentHistoryCsv = storage_path('app/public/'.$paiment->demande);
        
        $paimentHistories = Helper::csvToArray($paimentHistoryCsv);
        //dd($paimentHistories);
        $paimentHistories = collect($paimentHistories)->map(function ($paimentItem) use ($paiment) {
            return [
                'Compte a débiter' => $paiment->compte_debiter,
                'Intitulé compte à debiter' => $paiment->intitule_compte,          
                "Compte a crediter" => $paimentItem["Compte a crediter"],
                "Intitule compte a crediter" => $paimentItem["Intitule compte a crediter"],
                "Montant" => $paimentItem["Montant"],
                'Date operation' => $paiment->date_panier,
                'Reference remise' => $paiment->numero_panier,//numero panier
                'Reference opération' => $paimentItem['cni'],//cin
            ];
        });
        //dd($paimentHistories);
        $nombre= $paimentHistories->count();
        if($nombre>0){
              for($i= 0;$i<$nombre; $i++ ){
                 $cni= $paimentHistories[$i]['Reference opération'];
                
                 //dd($etudiantPaye);
                 FullCandidature::where('anne_universitaire', $paiment->anne_universitaire)->where('cni', $cni)->first();
                  $etudiantPaye= DB::table('be_etudiant_boursiers')->where('anne_universitaire', $paiment->anne_universitaire)->where('cni', $cni)->update(['montant'=>$paimentHistories[$i]['Montant']]);
                //  $etudiantPaye->montant= $paimentHistories[$i]['Montant'];
                // $etudiantPaye->save();
               
              }
        }
        $dateC= Carbon::now()->format('Y-m-d');
        return Helper::collectionToCsv($paimentHistories, $dateC.'_'.$paiment->numero_panier.'_'.$paiment->total.'_'.$paiment->numero_operation.'.csv');
        
        //add permission read only 
    } 
    
 

}