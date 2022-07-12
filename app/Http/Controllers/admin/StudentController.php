<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student ;
use App\Models\Candidature ;  
use App\Models\Bourse ; 
use App\Models\User ; 
use \Str; 
use \Illuminate\Support\Facades\Hash;
use App\Models\FullCandidature ; 
use App\Models\Exception ; 
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendMailJob;
use App\Jobs\SendStudentMailJob;
use Illuminate\Contracts\Queue\ShouldQueue;

class StudentController extends Controller
{
    //
    public function index()
    { 
            
        $list = Student::all(); 
        
        return view("admin.pages.etudiantInfo.liseteEtudiant")
            ->with('list', $list) ;  
    }
    
    function show($id)
    { 
        $student = Student::find($id); 
       //dd($student);
        return view("admin.pages.etudiantInfo.detailEtudiant",compact('student')) ; 
    }
    
    function getEtudiantInfo ()
    {
        $info = DB::table('be_students')->where('cni', Auth::user()->cni)->first() ; 
        //dd($info);
        $profession=explode("|",$info->profession_adherent); 
       // $info = Student::where('cni',['v12'])->first() ;    
        return view('admin.pages.informations.profile', compact('info', 'profession')); 
        
    }
    function getEtudiantInfoToUpdate ()
    { 
        $info = DB::table('be_students')
                ->where('cni', Auth::user()->cni)
                ->where('cne', Auth::user()->cne)->first() ; 
        $profession=explode("|",$info->profession_adherent); 
        //$info = Student::where('cni',['v12'])->first() ;    
        return view("admin.pages.informations.changeInfoProfile", compact('info', 'profession')); 
    }
    function update(Request $request , $id)
    {
        $student = DB::table('be_students')->where('cni', Auth::user()->cni)->update([

            'nom_prenomArab' => $request->input('nom_prenomArab') ,
            'cne' => $request->input('cne') ,
            'adresse' => $request->input('adresse') ,
            'lycee' => $request->input('lycee') ,        
            'nom_prenom_conjoint' => $request->input('nom_prenom_conjoint') ,
            'nom_prenom_adherent' => $request->input('nom_prenom_adherent') ,
            'email' => $request->input('email'),
            
            'nom_prenom_adherentAr' => $request->input('nom_prenom_adherentAr') ,
            'nom_prenom_conjointAr' => $request->input('nom_prenom_conjointAr') ,
            'adresse_parents' => $request->input('adresse_parents') ,
            'telephone_1' => $request->input('telephone_1') ,
            'date_naissance' => $request->input('date_naissance') ,        
            'lieu_naissance' => $request->input('lieu_naissance') ,
            'sexe' => $request->input('sexe') ,
            'filiere' => $request->input('filiere') ,
            'filiereBac' => $request->input('filiereBac') ,
            'mention' => $request->input('mention') ,
            'anne_bac' => $request->input('anne_bac') ,
            'note' => $request->input('note') ,
            'mention' => $request->input('mention') ,
            'profession_adherent' => $request->input('profession_f') ? implode('|',$request->input('profession_f')): '',
            'telephone_conjoint' => $request->input('telephone_conjoint') ,
            'universite' => $request->input('universite') ,
            'ecole' => $request->input('ecole') ,
            'etat_physique' => $request->input('etat_physique') ,        
            'profession_conjoint' => $request->input('profession_conjoint') ,
            'matricule' => $request->input('matricule') ,
            'region_id_etud' => $request->input('region_id_etud') ,
            'province_id_etud' => $request->input('province_id_etud') ,
            'ville' => $request->input('ville') ,
            'parents_deces' => $request->input('parents_deces') ,        
            'rib' => $request->input('rib') ,
            
        ]); 
            // user
             $user = DB::table('be_users')->where('cni', Auth::user()->cni)->update([
            'email' => $request->input('email'),
            'cne' => $request->input('cne')
    ]);
        
        
        $candidat= Candidature::where('cni', Auth::user()->cni)->first();
        if($candidat){
            $candidat->rib = $request->input('rib');
            $candidat->save();
        }
        
         $candidat_= FullCandidature::where('cni', Auth::user()->cni)->first();
        if($candidat_ && $request->input('rib')){
            $candidat_->rib = $request->input('rib');
            $candidat_->save();
        }
         
        // if($request->file('imageee')){
        //     $file = $request->file('imageee') ; 
        //     $ext = $file->getClientOriginalExtension() ; 
        //     $filename = time().'.'.$ext ;  
        //     $file->move(public_path('images'), $filename);
        //     $student->photo = $filename ;   
        // }   
        // $student->save() ;  
        return redirect('/boursier/etudiant/profile') ; 
    }
  
    function afficherDocs()
    {
        $items = Student::with('document')->get(); 
        return $items ;
        return view("admin.pages.etudiantInfo.docEtudiant")->with("items",$items) ;   
    }
 
    public function sendMailGlobal (Request $request)
    {
        $subject = $request->input("subject") ; 
        $contenu = $request->input("contenu") ;
    
        $template_data = [
            'content' => $contenu ,
            'title' => $subject  
            ]; 
      
            $job = new SendMailJob($template_data); 
            dispatch($job);
        return redirect("boursier/etudiant/liste") ; 
    }

public function resetPassword(Request $request){
   
    $user= DB::table("be_users")->where("email","like",$request->email)->first();
   if($user){
       
     //send email
     $pass = Str::random(5);
        $template_data = [
            'fullname' => $user->name,
            'email'=>$request->email,
            'password'=>$pass
        ];
        $mail = $request->email;
      Mail::send('mail.resetPassword', $template_data, function($message) use ($mail){
            $message->from('noreply@fondationfm6.com');
            $message->to($mail);
            $message->subject('Nouveau Password ');
        });
    $user= DB::table("be_users")->where("email","like",$request->email)->update([
        'password' => Hash::make($pass)
        ]);
         $message= "test test";
    return redirect()->route('login')->with('jsAlert', $message);
   }else{
       return 'verifiez email saisie';
   }

}

function SendMail(Request $request){
   $mail_id= $request->input('mail'); 
    $subject= $request->input("subject1") ;
   $contenu = $request->input("contenuMail") ;

   $template_data = [
    'title' => $subject, 
    'content' => $contenu ,
    ]; 

    $job = new SendStudentMailJob($template_data, $mail_id); 
    dispatch($job);
    return redirect("boursier/etudiant/liste") ;
}

    // search 
     function searchInfo (Request $request)
    {  
        $mot = $request->mot ;

        $searchResult = DB::table('be_students')   
                        ->where('cni','like','%'.$mot.'%')
                        ->orWhere('nom_prenom','like','%'.$mot.'%') 
                        ->orWhere('nom_prenomArab','like','%'.$mot.'%') 
                        // ->orWhere('nom_province','like','%'.$mot.'%')  
                        // ->orWhere('nom_region','like','%'.$mot.'%') 
                         ->select('*')
                        ->get();   
                        // return $searchResult ; 
        return view("layouts.searchStudent",compact('mot','searchResult')) ; 
    }
    function showSearch($cni)
    {
        $etud = DB::table('be_students')->join('be_provinces', 'be_students.province_id_etud', '=', 'be_provinces.id')
                            ->join('be_regions', 'be_students.region_id_etud', '=', 'be_regions.id')
                            ->where('cni',$cni)->first() ;
                            
        $etudBourse = DB::table('be_bourses')
        ->join('be_students', 'be_students.cni', '=', 'be_bourses.cni')->where('be_bourses.cni',$cni)->get() ;
        dd();
        $stopped =DB::table('be_exceptions')->where('cni',$cni)->where('nbre_exception',1)->first() ;
        $stoppedDefi = DB::table('be_exceptions')->where('cni',$cni)->where('nbre_exception',2)->first() ; 
        return view('layouts.seeMoreSearch',compact('etud','etudBourse','stopped','stoppedDefi')) ; 
    }
}