<?php

namespace App\Http\Controllers\admin;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRenouvellementRequest;
use Illuminate\Http\Request;
use App\Models\Exception ; 
use App\Models\Renouvellement ; 
use App\Models\Student ; 
use App\Models\User ; 
use App\Models\Bourse ; 
use App\Models\FullCandidature ;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Models\Contorole;
class RenouvellementController extends Controller
{
    //

    public function index(){
        $renouvellements= Renouvellement::paginate(6);
        return view("admin.pages.inscription.renouvellement", compact('renouvellements')) ;
    }
    
    public function getRenouvellement ()
    {
        $inscription = Contorole::where('nom_fonction','اعادة التسجيل')->first() ; 
        $list = Renouvellement::withoutGlobalScopes()->where('cni',Auth::user()->cni)->first() ;  
        return view('admin.pages.inscription.reinscriptionChange' ,compact('list','inscription'));
    }
    
    public function create(){
        $inscription = Contorole::where('nom_fonction','اعادة التسجيل')->first() ;  
        return view("admin.pages.inscription.reinscription" , compact('inscription')) ;

    }

    function store (StoreRenouvellementRequest $request)
 {
      
       
        $student= DB::table('be_students')->where('cni', Auth::user()->cni)->first();
        //dd($student);
        $newDateTime = Carbon::now()->addYears(1);
        $renouv = new Renouvellement() ;
        $renouv->cne = Auth::user()->cne ; 
        $renouv->cni = Auth::user()->cni ;
        $renouv->nom_prenom = Auth::user()->name;
        $renouv->universite = $request->input('universite') ;
        $renouv->anne_universitaire = "2021/2022";
        //date('Y').'/'.$newDateTime->format('Y'); 
        $renouv->ecole = $request->input('school') ;
        $renouv->justification = $request->input('justification');
        $renouv->numero_compte = $request->input('numero_compte');
        $renouv->promotion = $student->promotion; 
        //dd($renouv);
        if($request->file('attestation'))
        {
            $attestation = $request->file('attestation');
            $filename = time().'.'. $attestation->getClientOriginalExtension();
            $filePath = public_path() . '/images';
            //dd(public_path() . '/images');
            $attestation->move($filePath, $filename);
            $renouv->attestation  = $filename;
        }
        if($request->file('attestation_reinscription'))
        {
            $attestation_reinscription = $request->file('attestation_reinscription');
            $filename2 = time() . '_.' .  $attestation_reinscription->getClientOriginalExtension();
            
            $filePath2 = public_path() . '/images';
            $attestation_reinscription->move($filePath2, $filename2);
            $renouv->attestation_reinscription  = $filename2;
        }
        
         if($request->file('attestation_rib'))
        {
            $attestation_rib = $request->file('attestation_rib');
            $filename3 = time() . '_.' .  $attestation_rib->getClientOriginalExtension();
            
            $filePath3 = public_path() . '/images';
            $attestation_rib->move($filePath3, $filename3);
            $renouv->attestation_rib  = $filename3;
        }
        $renouv->save() ; 
        return redirect("boursier/reinscription/modification");
    }

    function update(Request $request) {

        $renouv= Renouvellement::withoutGlobalScopes()->where('cni', Auth::user()->cni)->first();
        $renouv->universite = $request->input('universite') ; 
        $renouv->ecole = $request->input('school') ;
        $renouv->justification = $request->input('justification');
        $renouv->numero_compte = $request->input('numero_compte');
        if ($request->file('attestation')) {
            $name = rand().'_'.$request->file('attestation')->getClientOriginalExtension();
            $filePath = public_path() . '/images';
            $request->file('attestation')->move($filePath, $name);
            $renouv->attestation = $name; 
        }
        if ($request->file('attestation_reinscription')) {
            $name = rand().'_'.$request->file('attestation_reinscription')->getClientOriginalExtension();
            $filePath = public_path() . '/images';
            $request->file('attestation_reinscription')->move($filePath, $name);
            $renouv->attestation_reinscription = $name; 
        } 
   
  if ($request->file('attestation_rib')) {
            $name = rand().'_'.$request->file('attestation_rib')->getClientOriginalExtension();
            $filePath = public_path() . '/images';
            $request->file('attestation_rib')->move($filePath, $name);
            $renouv->attestation_rib = $name; 
        } 
        $renouv->save();
        return redirect("boursier/reinscription/modification") ;
    }
    public function show($id)
    {
        $renouvellements= Renouvellement::withoutGlobalScopes()->where('id', $id)->first();
        
        $exception = Exception::where("cni",$renouvellements->cni)->first() ;  
        return view("admin.pages.inscription.show", compact('renouvellements','exception'));
    }

    function listeRenouvenllant()
    { 
        $items = DB::select("select * from be_renouvellements r , be_students s where s.cni = r.cni ") ; 
        return view("admin.pages.inscription.renouvellement",compact('items'))  ; 
    }

    public function sendMail(Request $request)
    {
        
        // $renouv = new Renouvellement() ;
        $user = User::select('email')->where('cni', $request->cni)->first();
        $mail= $user->email;
        
        $contenu = $request->input("contenu") ;
        $template_data = [   
            "email" => $mail , 
            "contenu" => $contenu 
        ] ;
        Mail::send("mail.sendMailTo", $template_data , function($msg) use ($mail) {
            $msg->from('fm6@gmail.com') ;
            $msg->to($mail); 
            $msg->subject('نقص معلومة او وثيقة') ;
    
        }) ;   
        return redirect('boursier/liste'); 
    }

    public function archiver(Request $request)
    {   $id= $request->renouvllement_id;
        $renouvellement= Renouvellement::find($id);  
        $renouvellement->status = "archiver" ;   
        $renouvellement->save() ; 
        $NonBoursier=FullCandidature::where('cni',$renouvellement->cni)->latest()->first();
        if($NonBoursier!=NULL)
        {
        $NonBoursier->delete() ;
        }
        $NonBourse=Bourse::where('cni',$renouvellement->cni)->latest()->first();

        if($NonBourse!=NULL){ 
        $NonBourse->delete() ;
        }
        //------------ insert into exception table ------------
        $student = Student::where('cni',$renouvellement->cni)->first() ; 
        $exp = Exception::where('cni',$student->cni)->first() ;   
        if($exp) {   
            $exp->delete() ; 
            return redirect("/boursier/renouvellement/show/".$id); 
        }    
        
        $exception = new Exception() ; 
        $exception->cni = $student->cni  ;   
        $exception->cne = $student->cne  ; 
        $exception->promotion = $student->promotion ; 
        $exception->nom_prenom = $student->nom_prenom  ; 
        $exception->universite = $student->universite ; 
        $exception->anne_universitaire = $student->anne_universitaire ; 
        $exception->ecole = $student->ecole ; 
        $exception->filiere = $student->filiere;  
        $exception->nbre_exception = 2; 
        $exception->status = "توقيف نهائي" ; 
        $exception->boursier = "توقيف نهائي" ; 
        $exception->save() ;  
        return redirect('boursier/liste'); 
    }
    ///// accpeter
    public function accepter(Request $request)
    {   
        $id= $request->renouvllement_id; 
        $renouvellement= Renouvellement::find($id); 
        $renouvellement->status = "accepter" ;   
        $renouvellement->save() ;
        $Boursier=Exception::where('cni',$renouvellement->cni)->latest()->first();
        if($Boursier!=NULL && $Boursier->nbre_exception==2)
        {
        $Boursier->delete() ;
        }

        $exp = Exception::where('cni',$renouvellement->cni)->first() ;  
        if($exp) {  
            $exp->delete() ; 
            return redirect("/boursier/renouvellement/show/".$id); 
        }   

        /////////////////
        $student = Student::where('cni',$renouvellement->cni)->first() ;  
        $etudiantBoursier = new FullCandidature() ; 
        $etudiantBoursier->cni = $student->cni  ;   
        $etudiantBoursier->cne = $student->cne  ; 
        $etudiantBoursier->promotion = $student->promotion ; 
        $etudiantBoursier->nom_prenom = $student->nom_prenom  ; 
        $etudiantBoursier->anne_universitaire = $renouvellement->anneUniversitaire ; 
        $etudiantBoursier->save() ;  
        //------------ insert into bourse table ------------
        $etudBourse= Bourse::create([
            'annee_bourse' => $renouvellement->anneUniversitaire ,
            'cni' => $student->cni,
            'status'=> 'oui',
            ]) ; 
            
        return redirect('boursier/liste');
    }
    ///////////////// exception
    public function exception(Request $request)
    {
        $id= $request->renouvllement_id; 
        $renouvellement= Renouvellement::find($id) ; 
        $renouvellement->status = "exception" ;   
        $renouvellement->save() ;

        
        //------------ insert into exception table ------------
        $student = Student::where('cni',$renouvellement->cni)->first() ;   
        $exception = new Exception() ; 
        $exception->cni = $student->cni  ;   
        $exception->cne = $student->cne  ; 
        $exception->promotion = $student->promotion ; 
        $exception->nom_prenom = $student->nom_prenom  ; 
        $exception->universite = $student->universite ; 
        $exception->anne_universitaire = $renouvellement->anne_universitaire ; 
        $exception->ecole = $student->ecole ; 
        $exception->filiere = $student->filiere;  
        $exception->nbre_exception = 1; 
        $exception->status = "توقيف مؤقت" ; 
        $exception->boursier = "لا" ; 
        $exception->save() ;  
       // dd($student->cni);
        //------------ insert into bourse table ------------
        $etudBourse= Bourse::create([
            'anne_universitaire' => $renouvellement->anne_universitaire ,
            'cni' => $student->cni,
            'status'=> 'non',
            'promotion'=> $renouvellement->promotion,
            ]) ; 
            return redirect('boursier/liste');
    }

   

    

}