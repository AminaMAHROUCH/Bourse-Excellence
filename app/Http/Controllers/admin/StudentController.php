<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student ;
use App\Models\Candidature ;  
use App\Models\Bourse ; 
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
        $info = Student::where('cni',Auth::user()->cni)->first() ;  
       // $info = Student::where('cni',['v12'])->first() ;    
        return view('admin.pages.informations.profile')->with('info',$info) ; 
        
    }
    function getEtudiantInfoToUpdate ()
    { 
        $info = Student::where('cni',Auth::user()->cni)->first() ;  
        //$info = Student::where('cni',['v12'])->first() ;    
        return view("admin.pages.informations.changeInfoProfile")->with('info',$info) ; 
    }
    function update(Request $request , $id)
    {
        $student = Student::where('cni',$id)->first() ;    
        $student->telephone_1 = $request->input('tel_1') ; 
        $student->telephone_2 = $request->input('tel_2') ; 
        $student->email = $request->input('email') ; 
         
        if($request->file('imageee')){
            $file = $request->file('imageee') ; 
            $ext = $file->getClientOriginalExtension() ; 
            $filename = time().'.'.$ext ;  
            $file->move(public_path('images'), $filename);
            $student->photo = $filename ;   
        }   
        $student->update() ;  
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
        // return count(explode(' ' , $mot)); 
        $searchResult = DB::table('be_candidatures') 
                        ->join('be_provinces', 'be_candidatures.province_id_etud', '=', 'be_provinces.id')
                        ->join('be_regions', 'be_candidatures.region_id_etud', '=', 'be_regions.id')
                        // ->where('be_candidatures.id','<>',0)  
                        ->where('cni','like','%'.$mot.'%')
                        ->orWhere('nom_prenom','like','%'.$mot.'%') 
                        ->orWhere('nom_prenomArab','like','%'.$mot.'%') 
                        ->orWhere('nom_province','like','%'.$mot.'%')  
                        ->orWhere('nom_region','like','%'.$mot.'%') 
                         ->select('*')
                        ->get();   
                        // return $searchResult ; 
        return view("layouts.searchStudent",compact('mot','searchResult')) ; 
    }
    function showSearch($cni)
    {
        $etud = Candidature::join('be_provinces', 'be_candidatures.province_id_etud', '=', 'be_provinces.id')
                            ->join('be_regions', 'be_candidatures.region_id_etud', '=', 'be_regions.id')
                            ->where('cni',$cni)->first() ;
                            
        $etudBourse = Bourse::where('cni',$cni)->get() ;  
        $stopped =Exception::where('cni',$cni)->where('nbre_exception',1)->first() ;
        $stoppedDefi = Exception::where('cni',$cni)->where('nbre_exception',2)->first() ; 
        return view('layouts.seeMoreSearch',compact('etud','etudBourse','stopped','stoppedDefi')) ; 
    }
}