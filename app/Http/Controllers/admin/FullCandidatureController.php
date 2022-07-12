<?php

namespace App\Http\Controllers\admin;

use App\Exports\PanierExport;
use App\Exports\PanierExcel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FullCandidature ;
use App\Models\Intermediaire;
use App\Models\User;
use App\Models\Paiment;
use App\Models\Student;
use App\Models\Panier;
use App\Models\DataPdf;
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
                    'promotion' => $anne->promotion,
                    'affected' => 0

                ]) ; 
                $anne->panier= 1;
                $anne->save();
                
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
                     'promotion' => $et->promotion ,
                     'affected' => 0
                     
                 ]) ;  
                 $et->panier = 1;
                 $et->save();
                 
             }
         }else{
             return redirect()->back()->withErrors(['الرجاء تحديد مرشح واحد على الأقل']);;
         }
 
       return back();
     }

    //add to panier
    public function sendToPanier(Request $request, $type)
    {
        $ids = $request->input('select_list');
        //dd($ids);
            if($type==350){
                
                $intermidiares= Intermediaire::where('rib', 'like', "350%")->whereIn('id', $ids)->where('affected', 0)
                ->get();
                $in= Intermediaire::where('rib', 'like', "350%")->first();
             }else{
        $intermidiares= Intermediaire::where('rib', 'not like', "350%")->where('affected', 0)->whereIn('id', $ids)->get();
                
                $in= Intermediaire::where('rib', 'not like', "350%")->first();

            }
            
            if(count($intermidiares)> 0){
                
                $p= Panier::latest()->first();
                if(!$p){
                   $number=1;
                }else{
        
                    $number= ($p->id);
                }
                
                $filename = $number.'_panier.csv';
                $file_xlsx = $number.'_panier.xlsx';
                $file_pdf = $number.'_panier.pdf';
                Excel::store(new PanierExport($type,$ids), $filename, 'public'); 
                 Excel::store(new PanierExcel($type, $ids), $file_xlsx, 'public'); 
                 //Excel::store(new PanierExport($type), $file_pdf, 'public'); 
              
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
                //dd($panier->code);
                $panier->type= $type;
                $panier->anne_universitaire= $in->anne_universitaire;
                $panier->promotion= $intermidiares[0]->promotion;
                $panier->save();
               //dd($panier);
        
               //add code to table intermidiare 
                
              foreach($intermidiares as $intermidiar){
                  $intermidiar->code = $panier->num_panier;
                  $intermidiar->affected = 1;
                  $intermidiar->save();
                  //
                $candidat= DB::table('be_students')->where('cni', $intermidiar->cni)->first();
               
                $dataPDF= new DataPdf();
                $dataPDF->cni=$candidat->cni;
                $dataPDF->nom_prenom_ar=$candidat->nom_prenomArab;
                $dataPDF->nom_prenom_fr=$candidat->nom_prenom;
                $dataPDF->rib=$candidat->rib;
                $dataPDF->montant=$intermidiar->montant;
                $dataPDF->anne_universitaire=$candidat->anne_universitaire;
                $dataPDF->code=$intermidiar->code;
                $dataPDF->save();
              }
        
                return redirect('boursier/finance');
            }else{
                return back();
            }
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
    public function destroy(Request $request, $cni){
        $intermidiare= Intermediaire::where('cni', $cni)->first();
        $fullcandidat = FullCandidature::where('cni', $cni)->first();
        $fullcandidat->panier = 0;
        $fullcandidat->save();
        $data =DataPdf::where('cni', $cni)->where('code', $intermidiare->code)->first();
        if($data){
            $data->delete();
        }
        $intermidiare->delete();
        return back();
    }

    //update panier
    public function editPanier($id){
        $panier= Panier::find($id);
        $intermidiaires=Intermediaire::where('code', $panier->num_panier)->get();
        if($panier->type == 350){
            $fullCandidatures= FullCandidature::where('panier', 0)->
            where('rib', 'like', '350%')->get();

        }else if($panier->type == 000){
            $fullCandidatures= FullCandidature::where('panier', 0)->
            where('rib', 'not like', '350%')->get();
        }
        return view('admin.pages.paiement.editPanier', compact('panier', 'intermidiaires', 'fullCandidatures'));

    }

    //supprimer 
    public function delete(Request $request){

        $ids = $request->input('row_'); 
        if(count((array)$ids)>0){
            $intermidiaires= Intermediaire::whereIn('id', $ids)->get(); 
            foreach ($intermidiaires as $et) { 
              $et->delete();   
              $fullCandidat = FullCandidature::where('cni',$et->cni)->first();
              $fullCandidat->panier = 0;
              $fullCandidat->save();
            }
        }else{
            return redirect()->back()->withErrors(['الرجاء تحديد مرشح واحد على الأقل']);;
        }

      return back();

    }
    public function deleteGlobal(Request $request){
       $ids = $request->row_; 
       dd($ids);

    }

    public function updatePanier($id){
        $panier= Panier::find($id);
        // $intermidiars= Interlidiare
        File::delete('storage/'.$panier->listes);
        File::delete('storage/'.$panier->file_xlsx);
        File::delete('storage/'.$panier->file_pdf);
        if($panier->type==350){
            $filename1 = $panier->id.'_panier.csv';
            $file_xlsx1 = $panier->id.'_panier.xlsx';
            $file_pdf1 = $panier->id.'_panier.pdf';
            //Excel::store(new PanierExport($panier->num_panier), $filename1, 'public'); 

            Excel::store(new PanierExport($panier->type, $panier->num_panier), $filename1, 'public'); 
            Excel::store(new PanierExport($panier->type, $panier->num_panier), $file_xlsx1, 'public'); 
            Excel::store(new PanierExport($panier->type, $panier->num_panier), $file_pdf1, 'public'); 
         }else{
            $filename1 = $panier->id.'_panier.csv';
            $file_xlsx1 = $panier->id.'_panier.xlsx';
            $file_pdf1 = $panier->id.'_panier.pdf';
            //Excel::store(new PanierExport($panier->num_panier), $filename1, 'public'); 

            Excel::store(new PanierExport($panier->type, $panier->num_panier), $filename1, 'public'); 
        Excel::store(new PanierExport($panier->type, $panier->num_panier), $file_xlsx1, 'public'); 
            Excel::store(new PanierExport($panier->type, $panier->num_panier), $file_pdf1, 'public'); 
        }
        dd($panier);
        if($panier->type==350){
            $intermidiares= Intermediaire::where('rib', 'like', '350%')->where('code', $panier->num_panier)->get();
         }else{
            $intermidiares= Intermediaire::where('rib', 'notlike', '350%')->where('code', $panier->num_panier)->get();
        }
      
        $panier->listes=$filename1;
        $panier->file_xlsx=$file_xlsx1;
        $panier->file_pdf=$file_pdf1;
        $panier->code= count($intermidiares);
        dd($panier);
        $panier->save();
        //
       
      
        foreach($intermidiares as $intermidiare){
             $dataPd = DataPdf::where('code', $panier->num_panier)->select('cni')->get();

            if(!$dataPd->contains('cni',$intermidiare->cni)){
                $candidat= DB::table('be_students')->where('cni', $intermidiare->cni)->first();
                $dataPDF= new DataPdf();
                $dataPDF->cni=$candidat->cni;
                $dataPDF->nom_prenom_ar=$candidat->nom_prenomArab;
                $dataPDF->nom_prenom_fr=$candidat->nom_prenom;
                $dataPDF->rib=$candidat->rib;
                $dataPDF->montant=$intermidiare->montant;
                $dataPDF->anne_universitaire=$candidat->anne_universitaire;
                $dataPDF->code=$intermidiare->code;
                $dataPDF->save();
            }
            $intermidiare->affected = 1;
            $intermidiare->save();
           
        }
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
    
     public function annuler($id)
    {

       $panier =  Panier::where('id', $id)->first();
       $panier->annuler = 1;
       $panier->save();
    //   update([
    //         'annuler'=> "1"
    //     ]);
        $intermidoares = Intermediaire::where('code', $panier->num_panier)->get();
        foreach($intermidoares as $in){
            $in->affected = 0;
            $in->code = '';
            $in->save();
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

     public function changeEtat($id){
     $paiment= Paiment::find($id);
     $paiment->markAsPaid();
        return back();
    }


       public function annulerPanier($id, Request $request)
    {
        
        $paiment = Paiment::find($id);
        $paiment->description=$request->input('description');
        $paiment->save();
        //insert into table intermidiare
        $header = null;
        $file = storage_path('app/public/'.$paiment->demande);
        //  if (($open = fopen($file, "r")) !== FALSE) {

        //     while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
        //         $students[] = $data;
        //     }
        //     fclose($open);
        // }
        // dd($students);
       if(($handle = fopen($file, 'r')) !== FALSE) {
           $data = fgetcsv($handle, 1000, ';', '"');
            while (($data = fgetcsv($handle, 1000, ';', '"')) !== FALSE) {
                    $anne= FullCandidature::where('cni', $data[3])->select('anne_universitaire', 'promotion')->first();
                   
                   $tes= Intermediaire::create([
                        'nom_prenom' => trim($data[1], '"'),
                        'rib' =>  trim($data[0], '"'),
                        'montant' =>  trim($data[2], '"'),
                        'cni' =>  trim($data[3], '"'),
                        'anne_universitaire' => $anne->anne_universitaire,
                        'promotion' => $anne->promotion,
                        'affected' => 0
                    ]);
                 
                
            }
            fclose($handle);
        }
        return back();
    }

public function downloadFile($id, Request $request)
    {
        
        $paiment= Paiment::find($id);
        // $paiment->markAsPaid();
        $paimentHistoryCsv = storage_path('app/public/'.$paiment->demande);
        $paimentHistories = Helper::csvToArray($paimentHistoryCsv);
        $nombre= count($paimentHistories);
        $paimentHistories = collect($paimentHistories)->map(function ($paimentItem) use ($paiment, $nombre ) {
            for($i=0; $i<$nombre; $i++){
            return [
                $paiment->compte_debiter,
                $paiment->intitule_compte,          
                $paimentItem[$i][0],
                $paimentItem[$i][1],
                $paimentItem[$i][2],
                Carbon::createFromFormat('Y-m-d',  $paiment->date_panier)->format('dmy'),
                $paiment->numero_panier,
                $paimentItem[$i][3],
            ];
        }
        });
         if($nombre>0){
              for($i= 1;$i<$nombre; $i++ ){
                 $cni= $paimentHistories[$i][7];
                 $etudiantPaye= FullCandidature::where('anne_universitaire', $paiment->anne_universitaire)->where('cni', $cni)->first();
                 $etudiantPaye->montant= $paimentHistories[$i][4];
                $etudiantPaye->save();
               
              }
        }
        $dateC= Carbon::now()->format('Y-m-d');
        return Helper::collectionToCsv($paimentHistories, $dateC.'_'.$paiment->numero_panier.'_'.$paiment->total.'_'.$nombre.'.csv');
        
        
        //add permission read only 
    } 
    
 

}