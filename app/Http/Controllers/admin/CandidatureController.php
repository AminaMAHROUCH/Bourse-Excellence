<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\candidatureStore;
use App\Models\Candidature;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Region;
use App\Models\Exception;
use App\Models\Bourse;
use App\Models\FullCandidature;
use App\Models\Intermediaire;
use App\Models\Renouvellement ; 
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Student;
use App\Models\User;
use App\Services\CandidatService;
use Illuminate\Support\Facades\Auth;
use \Str; 
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use Illuminate\Support\Facades\Http;
use App\Exports\CandiatureExport;
use Illuminate\Support\Facades\Validator;

class CandidatureController extends Controller
{

    
    public function index(Request $request)
    {
        $candidatures= Candidature::where('status', '!=', 'archiver')->get(); 
        //dd($candidatures);
        $attente= Candidature::where('status', 'en attente')->get();
        $accepter= Candidature::where('status', 'accepter')->get();
        $valider= Candidature::where('valider', 1)->get();
        $exception= Exception::all();
        $renouvellements= Renouvellement::all();  
        $fullCandidatures = FullCandidature::all();
        $candidats= Candidature::where('status', 'archiver')->get();
        $etudiantRejeters= Renouvellement::where('status', 'archiver')->get(); 
        $intermidiaresBB= Intermediaire::where('rib', 'like', '350%')->get();

        $help= Intermediaire::where('rib', 'like', '350%')->select('rib')->get();
        $intermidiares= Intermediaire::whereNotIn('rib', $help)->get();
    

        return view("admin.pages.listes.list", compact('candidatures','renouvellements','exception','fullCandidatures','etudiantRejeters','candidats', 'attente', 'accepter', 'valider', 'intermidiares', 'intermidiaresBB')); 
    }


       function addRIB(Request $request)
       {   
          $candidature = Candidature::where('cni',Auth::user()->cni)->first() ;   
          $candidature->rib = $request->rib ;
          $candidature->save() ; 
          return redirect("/boursier/getCandidature");
      }

    public function getCandidature()
    {
        
        $cni= Auth::user()->cni;
        $regions = Region::all()->pluck('nom_region', 'id');
        $provinces = Province::all()->pluck('nom_province', 'id');
        $Candidature = DB::table('be_candidatures')->where('cni', $cni)->select('*')->first();
       
        //dd($Candidature);
        $profession=explode("|",$Candidature->profession_adherent);
        $user= User::where('cni', $cni)->first();   
        return view('candidature.EditCandidature', compact('Candidature', 'regions', 'user','profession', 'provinces'));
    }
    
    public function dropdownProvince(Request $request)
    {
        $province = Province::where('region_id', $request->id)->get();  
        return  response()->json($province);
        
    }

    public function Check(Request $request, CandidatService $candidatService)
    {
        
        // $adherent= Adherent::where('cni', $request->cni)->first();

        $regions = Region::all()->pluck('nom_region', 'id');

        $isActive = $candidatService->checkCandidatIsActiveByCIN($request->cni);
        if($isActive){
            $adherent = $candidatService->getCandidatByCIN($request->cni)->WsAdherent;
            $etatAdherent = $candidatService->getCandidatByCIN($request->cni)->WsEtatAdhesion;
            
         return view('candidature.formulaire', compact('regions', 'adherent', 'etatAdherent'));
        }else{
            return Redirect::back()->with('error_code', 5);
        }
        //  if($adherent){
        //     return view('candidature.formulaire', compact('regions', 'adherent'));
        // }else{
        //     return Redirect::back()->with('error_code', 5);
        // }

    }
    public function createC(Request $request)
    {
        $adherent= Adherent::where('cni', $request->cni)->first();
        $regions = Region::all()->pluck('nom_region', 'id');
        return view('candidature.formulaire', compact('regions',  'adherent'));


    }


 public function store(Request $request)
    {
        $candidature = new Candidature() ; 
        if($request->file('photo')){
            $photo = $request->file('photo'); 
            $new_name = rand() . '.' . $photo->getClientOriginalExtension();
            $photo->move(storage_path('app/public/images/'), $new_name);
            $candidature->photo  = $new_name;
        }
        $candidature->nom_prenomArab  = $request->input('full_nameArab');
        $candidature->nom_prenom  = $request->input('full_nameFr');
        $candidature->cni  = $request->input('cni');
        $candidature->lieu_naissance  = $request->input('lieu_naissance');
        $candidature->date_naissance  = $request->input('date_naissance');
        $created = new Carbon($request->input('date_naissance'));
        $now = Carbon::now();
        $candidature->age  = $created->diff($now)->format('%y');
        $candidature->email  = $request->input('email');
        $candidature->sexe  = $request->input('sexe');
        $candidature->telephone_1  = $request->input('telephone_1');
        $candidature->telephone_2  = $request->input('telephone_2');  
        $candidature->etat_physique  = $request->input('etat');
        $candidature->deces  = $request->input('deces');
        $candidature->parents_deces  = $request->input('parents_deces');
        $candidature->nbr_freres  = $request->input('nbre_freres');
        $candidature->region_id_etud  = $request->input('region');
        $candidature->province_id_etud  = $request->input('province'); 
        $candidature->adresse  = $request->input('adresse'); 
        $candidature->profession = $request->input('profession');
        $candidature->note  = $request->input('note');
        $candidature->cne  = $request->input('cne');
        $candidature->mention  = $request->input('mention');
        $candidature->anne_universitaire  = $request->input('anneUniversitaire');//cpanel
        $candidature->anne_bac  = $request->input('anne_bac');
        $candidature->lycee  = $request->input('lycee');
        $candidature->filiereBac  = $request->input('filiereBac');
        $candidature->filiere  = $request->input('filiere');
        $candidature->universite  = $request->input('universite');
        $candidature->ecole  = $request->input('ecole');
        $candidature->ville  = $request->input('ville');
        $candidature->duree_etude  = $request->input('duree_etude');
        $candidature->promotion  = date('Y');//cpanel

      
        $candidature->nom_prenom_adherentAr  = $request->input('nom_Arab_recu');  
        $candidature->nom_prenom_adherent  = $request->input('nom_Fr_recu');
        $candidature->matricule  = $request->input('matricule_recu');
        $candidature->cni_adherent  = $request->input('cni_recu');
        $candidature->region  = $request->input('region_recu');
        $candidature->province  = $request->input('province_recu');  
        
            
        $candidature->dateInscription = date('Y-m-d');  
        $candidature->profession_adherent  = implode('|',$request->input('profession_f'));
        $candidature->profession_conjoint  = $request->input('profession_conjoint');
        $candidature->salaire  = ($request->input('salaire_f'));
        $candidature->salaire_conjoint  = $request->input('salaire_conjoint');       

        $candidature->nom_prenom_conjointAr  = $request->input('nom_prenom_conjointAr');
        $candidature->nom_prenom_conjoint  = $request->input('nom_prenom_conjoint');
        $candidature->telephone_adherent  = $request->input('telephone_adherent');
        $candidature->telephone_conjoint  = $request->input('telephone_conjoint');
        $candidature->adresse_parents  = $request->input('adresse_parents');


        if($request->file('AttestationBac')){
            $AttestationBac = $request->file('AttestationBac'); 
            $new_name = rand() . '.' . $AttestationBac->getClientOriginalExtension();
            $AttestationBac->move(storage_path('app/public/images/'), $new_name);
            $candidature->AttestationBac  = $new_name;
        }
        if($request->file('RelvesNote')){
            $RelvesNote = $request->file('RelvesNote'); 
            $new_name = rand() . '.' . $RelvesNote->getClientOriginalExtension();
            $RelvesNote->move(storage_path('app/public/images/'), $new_name);
            $candidature->RelvesNote  = $new_name;
        }
        
        if($request->file('attestationProfession_adherent'))
        {
            $attestationProfession_adherent = $request->file('attestationProfession_adherent'); 
            $new_name = rand() . '.' . $attestationProfession_adherent->getClientOriginalExtension();
            $attestationProfession_adherent->move(storage_path('app/public/images/'), $new_name);
            $candidature->attestationProfession_adherent  = $new_name; 
        }

        if($request->file('attest_revenu_mensuel_adh'))
        {
            $attest_revenu_mensuel_adh = $request->file('attest_revenu_mensuel_adh'); 
            $new_name = rand() . '.' . $attest_revenu_mensuel_adh->getClientOriginalExtension();
            $attest_revenu_mensuel_adh->move(storage_path('app/public/images/'), $new_name);
            $candidature->attest_revenu_mensuel_adh  = $new_name; 
        }

        if($request->file('attestationProfession_conjoint'))
        {
            $attestationProfession_conjoint = $request->file('attestationProfession_conjoint'); 
            $new_name = rand() . '.' . $attestationProfession_conjoint->getClientOriginalExtension();
            $attestationProfession_conjoint->move(storage_path('app/public/images/'), $new_name);
            $candidature->attestationProfession_conjoint  = $new_name; 
        }

        if($request->file('attest_revenu_mensuel_conj'))
        {
            $attest_revenu_mensuel_conj = $request->file('attest_revenu_mensuel_conj'); 
            $new_name = rand() . '.' . $attest_revenu_mensuel_conj->getClientOriginalExtension();
            $attest_revenu_mensuel_conj->move(storage_path('app/public/images/'), $new_name);
            $candidature->attest_revenu_mensuel_conj  = $new_name;
        }
        if($request->file('attestationAdherent'))
        {
            $attestationAdherent = $request->file('attestationAdherent'); 
            $new_name = rand() . '.' . $attestationAdherent->getClientOriginalExtension();
            $attestationAdherent->move(storage_path('app/public/images/'), $new_name);
            $candidature->attestationAdherent  = $new_name;
        }
        if($request->file('cni_image'))
        {
            $cni_image = $request->file('cni_image'); 
            $new_name = rand() . '.' . $cni_image->getClientOriginalExtension();
            $cni_image->move(storage_path('app/public/images/'), $new_name);
            $candidature->cni_image  = $new_name; 
        }
        $candidature->save() ;
        //User table
        $pass = Str::random(10);
        $user = new User() ;
        $user->name = $candidature->nom_prenom;
        $user->email = $candidature->email;
        $user->password = Hash::make($pass);
        $user->cne = $candidature->cne;
        $user->cni  = $candidature->cni;
        //$user->role  = 'student';
        //send email
        $template_data = [
            'fullname' => $user->name,
            'email'=>$user->email,
            'password'=>$pass
        ];
        $mail = $user->email;
        Mail::send('mail.authentificationEmail', $template_data, function($message) use ($mail){
            $message->from('noreply@fondationfm6.com');
            $message->to($mail);
            $message->subject('Candidature ');
        });

        $user->save();
        //Role
        $role= Role::where('titre', 'candidat')->first();
        $role_user = new RoleUser() ;
        $role_user->user_id= $user->id;
        $role_user->role_id= $role->id;
        $role_user->save();
        $message= "test test";
        return redirect()->route('login')->with('jsAlert', $message);

    }

    public function validateCondidature(Request $request)
    {
        switch ($request->input('step')) {
            case 'step_1':
                $this->validate($request, [
                    'profession_f' => 'required',
                    'salaire_f' => 'required|numeric',
                    'telephone_adherent'=> 'required',
                    'adresse_parents'=> 'required'
                ],
                [
                    'profession_f.required' => 'المرجو تحديد مهمة القيم الديني', 
                    'salaire_f.required' => 'المرجو إدخال مكافأة القيم الديني', 
                    'telephone_adherent.required' => 'المرجو إدخال رقم هاتف القيم الديني', 
                    'adresse_parents.required'  => 'المرجو إدخال عنوان القيم (ة) الديني (ة) (ولي (ة) الأمر)'
                ]);
                break;
            case 'step_2': 
                $this->validate($request, [
                    'email'        => 'required|unique:be_candidatures',
                    'cni'      => 'required|unique:be_candidatures',
                    'full_nameArab'=> 'required',
                    'full_nameFr'=> 'required',
                    'telephone_1' => 'required',
                    'sexe' => 'required',
                    'region' => 'required',
                    'province' => 'required',
                    'date_naissance' => 'required'
                ],
                [
                    'full_nameArab.required' => 'المرجو إدخال اسم المترشح باللغة العربية',
                    'email.required'        => 'المرجو إدخال البريد الإلكتروني',
                    'email.unique'        => 'سبق استعمال هذا البريد الإلكتروني',
                    'cni.required'      => 'المرجو إدخال رقم البطاقة الوطنية',
                    'cni.unique'      => 'سبق ادراج هذا الرقم',
                    'full_nameFr.required' => 'المرجو إدخال اسم المترشح باللغة الفرنسية',
                    'telephone_1.required' => 'المرجو إدخال رقم الهاتف',
                    'sexe.required' => 'المرجو تحديد جنس المترشح',
                    'region.required' => 'المرجو تحديد الجهة',
                    'province.required' => 'المرجو تحديد الإقليم',
                    'date_naissance.required' => 'المرجو تحديد تاريخ الازدياد'
                ]);
                break;
            case 'step_3': 
                $this->validate($request, [
                    'cne'      => 'required|unique:be_candidatures',
                    'anne_bac'   => 'required|after_or_equal:'.\Carbon\Carbon::now()->format("Y"),
                    'note' => 'required|numeric|gte:15|lte:20',
                ],
                [
                    'cne.required'      => 'المرجو إدخال الرقم الوطني للطالب',
                    'cne.unique'      => 'سبق ادراج هذا الرقم',
                    'anne_bac.required'   => 'المرجو إدراج سنة الحصول على البكالوريا',
                    'anne_bac.after_or_equal'   => 'يجب أن تكون سنة الحصول على البكالوريا مطابقة للسنة الجارية',
                    'note.required' => 'المرجو إدخال معدل البكالوريا',
                    'note.gte' => 'يجب ان يكون المعدل المحصل عليه أكبر أو يساوي 15/20',
                    'note.lte' => 'يجب ان يكون المعدل المحصل عليه أصغر من أو يساوي 20/20',

                ]);
                break;
            case 'step_4': 
                $this->validate($request, [
                    'AttestationBac' => 'required|max:1024',
                    'RelvesNote' => 'required|max:1024',
                ],
                [
                    'AttestationBac.max' => 'يجب أن لايتجاوز حجم الصورة 1MO',
                    'RelvesNote.max' => 'يجب أن لايتجاوز حجم الصورة 1MO',
                    'AttestationBac.required' => 'المرجو إدخال شهادة البكالوريا',
                    'RelvesNote.required' => 'المرجو إدخال بيان النقط'    
                ]);
                break;
            
        }
    }

    public function validateCondidatureUpdate(Request $request)
    {
        switch ($request->input('step')) {
            case 'step_1':
                $this->validate($request, [
                    'profession_f' => 'required',
                    'salaire_f' => 'required|numeric',
                    'telephone_adherent'=> 'required|numeric',
                    'adresse_parents'=> 'required'
                ],
                [
                    'profession_f.required' => 'المرجو تحديد مهمة القيم الديني', 
                    'salaire_f.required' => 'المرجو إدخال مكافأة القيم الديني', 
                    'salaire_f.numeric' => 'المرجو إدخال مكافأة القيم الديني', 
                    'telephone_adherent.required' => 'المرجو إدخال رقم هاتف القيم الديني', 
                    'telephone_adherent.numeric' => 'يجب أن يتكون رقم الهاتف من 10 أرقام', 
                    'adresse_parents.required'  => 'المرجو إدخال عنوان القيم (ة) الديني (ة) (ولي (ة) الأمر)'
                ]);
                break;
            case 'step_2': 
                $this->validate($request, [
                    'full_nameArab'=> 'required',
                    'full_nameFr'=> 'required',
                    'telephone_1' => 'required',
                    'sexe' => 'required',
                    'region_etud' => 'required',
                    'province_etud' => 'required',
                    'date_naissance' => 'required'
                ],
                [
                    'full_nameArab.required' => 'المرجو إدخال اسم المترشح باللغة العربية',
                    'full_nameFr.required' => 'المرجو إدخال اسم المترشح باللغة الفرنسية',
                    'telephone_1.required' => 'المرجو إدخال رقم الهاتف',
                    'sexe.required' => 'المرجو تحديد جنس المترشح',
                    'region.required' => 'المرجو تحديد الجهة',
                    'province.required' => 'المرجو تحديد الإقليم',
                    'date_naissance.required' => 'المرجو تحديد تاريخ الازدياد'
                ]);
                break;
            case 'step_3': 
                $this->validate($request, [
                    'anne_bac'   => 'required|after_or_equal:'.\Carbon\Carbon::now()->format("Y"),
                    'note' => 'required|numeric|gte:15|lte:20',
                ],
                [
                    'anne_bac.required'   => 'المرجو إدراج سنة الحصول على البكالوريا',
                    'anne_bac.after_or_equal'   => 'يجب أن تكون سنة الحصول على البكالوريا مطابقة للسنة الجارية',
                    'note.required' => 'المرجو إدخال معدل البكالوريا',
                    'note.gte' => 'يجب ان يكون المعدل المحصل عليه أكبر أو يساوي 15/20',
                    'note.lte' => 'يجب ان يكون المعدل المحصل عليه أصغر من أو يساوي 20/20',

                ]);
                break;
            case 'step_4': 
                $this->validate($request, [
                    'AttestationBac' => 'max:1024',
                    'RelvesNote' => 'max:1024',
                ],
                [
                    'AttestationBac' => 'يجب أن لايتجاوز حجم الصورة 1MO',
                    'RelvesNote' => 'يجب أن لايتجاوز حجم الصورة 1MO',
                ]);
                break;
            
        }
    }


    public function show($id)
    {
        $candidature= Candidature::find($id); 
        return view('admin.pages.candidature.detailsCandidature', compact('candidature'));
    }


    public function update(Request $request, $candidature)
    {  
        $candidature= Candidature::where('cni', Auth::user()->cni)->first();  
        if($request->file('photo')){
            $photo = $request->file('photo'); 
            $new_name = rand() . '.' . $photo->getClientOriginalExtension();
            $photo->move(storage_path('app/public/images/'), $new_name);
            $candidature->photo  = $new_name;
        }
        $candidature->nom_prenomArab  = $request->input('full_nameArab');
        $candidature->nom_prenom  = $request->input('full_nameFr');
        $candidature->cni  = $request->input('cni');
        $candidature->lieu_naissance  = $request->input('lieu_naissance');
        $candidature->date_naissance  = $request->input('date_naissance');
        $candidature->email  = $request->input('email');
        $candidature->sexe  = $request->input('sexe');
        $candidature->telephone_1  = $request->input('telephone_1');
        $candidature->telephone_2  = $request->input('telephone_2');  
        $candidature->etat_physique  = $request->input('etat');
        $candidature->deces  = $request->input('deces');
        $candidature->parents_deces  = $request->input('parents_deces');
        $candidature->nbr_freres  = $request->input('nbre_freres');
        $candidature->region_id_etud  = $request->input('region_etud');
        $candidature->province_id_etud  = $request->input('province_etud');  
        $candidature->adresse  = $request->input('adresse');
         
        $candidature->profession_adherent  = implode('|',$request->input('profession_f'));
        $candidature->telephone_adherent  = $request->input('telephone_adherent'); 
        $candidature->nom_prenom_conjointAr  = $request->input('nom_prenom_conjointAr');
        $candidature->nom_prenom_conjoint  = $request->input('nom_prenom_conjoint');
        $candidature->profession = $request->input('profession');
        $candidature->profession_conjoint  = $request->input('profession_conjoint');
        $candidature->telephone_conjoint  = $request->input('telephone_conjoint');
        $candidature->salaire  = $request->input('salaire_f');
        $candidature->salaire_conjoint  = $request->input('salaire_conjoint');
        $candidature->adresse_parents  = $request->input('adresse_parents'); 

        $candidature->note  = $request->input('note');
        $candidature->mention  = $request->input('mention');
        $candidature->anne_universitaire  = $request->input('anneUniversitaire');//cpanel
        $candidature->anne_bac  = $request->input('anne_bac');
        $candidature->lycee  = $request->input('lycee');
        $candidature->filiereBac  = $request->input('filiereBac');
        $candidature->filiere  = $request->input('filiere');
        $candidature->universite  = $request->input('universite');
        $candidature->ecole  = $request->input('ecole');
        $candidature->ville  = $request->input('ville');
        $candidature->duree_etude  = $request->input('duree_etude');

        if($request->file('AttestationBac')){
            $AttestationBac = $request->file('AttestationBac'); 
            $new_name = rand() . '.' . $AttestationBac->getClientOriginalExtension();
            $AttestationBac->move(storage_path('app/public/images/'), $new_name);
            $candidature->AttestationBac  = $new_name;
        }
        if($request->file('RelvesNote')){
            $RelvesNote = $request->file('RelvesNote'); 
            $new_name = rand() . '.' . $RelvesNote->getClientOriginalExtension();
            $RelvesNote->move(storage_path('app/public/images/'), $new_name);
            $candidature->RelvesNote  = $new_name;
        }
        
        if($request->file('attestationProfession_adherent'))
        {
            $attestationProfession_adherent = $request->file('attestationProfession_adherent'); 
            $new_name = rand() . '.' . $attestationProfession_adherent->getClientOriginalExtension();
            $attestationProfession_adherent->move(storage_path('app/public/images/'), $new_name);
            $candidature->attestationProfession_adherent  = $new_name; 
        }

        if($request->file('attest_revenu_mensuel_adh'))
        {
            $attest_revenu_mensuel_adh = $request->file('attest_revenu_mensuel_adh'); 
            $new_name = rand() . '.' . $attest_revenu_mensuel_adh->getClientOriginalExtension();
            $attest_revenu_mensuel_adh->move(storage_path('app/public/images/'), $new_name);
            $candidature->attest_revenu_mensuel_adh  = $new_name; 
        }

        if($request->file('attestationProfession_conjoint'))
        {
            $attestationProfession_conjoint = $request->file('attestationProfession_conjoint'); 
            $new_name = rand() . '.' . $attestationProfession_conjoint->getClientOriginalExtension();
            $attestationProfession_conjoint->move(storage_path('app/public/images/'), $new_name);
            $candidature->attestationProfession_conjoint  = $new_name; 
        }

        if($request->file('attest_revenu_mensuel_conj'))
        {
            $attest_revenu_mensuel_conj = $request->file('attest_revenu_mensuel_conj'); 
            $new_name = rand() . '.' . $attest_revenu_mensuel_conj->getClientOriginalExtension();
            $attest_revenu_mensuel_conj->move(storage_path('app/public/images/'), $new_name);
            $candidature->attest_revenu_mensuel_conj  = $new_name;
        }
        if($request->file('attestationAdherent'))
        {
            $attestationAdherent = $request->file('attestationAdherent'); 
            $new_name = rand() . '.' . $attestationAdherent->getClientOriginalExtension();
            $attestationAdherent->move(storage_path('app/public/images/'), $new_name);
            $candidature->attestationAdherent  = $new_name;
        }
        if($request->file('cni_image'))
        {
            $cni_image = $request->file('cni_image'); 
            $new_name = rand() . '.' . $cni_image->getClientOriginalExtension();
            $cni_image->move(storage_path('app/public/images/'), $new_name);
            $candidature->cni_image  = $new_name; 
        }
        $candidature->save() ; 
        //============================Edit table user ==========================//
        $pass= $request->input('password');
        if($pass){
            $form_data = array(
                    'name'       =>   $candidature->nom_prenom,
                    'password'   =>   Hash::make($pass),
                    'email'      =>   $candidature->email , 
                );
                User::where('cni', $candidature->cni)->update($form_data); 
        }else{
            $form_data = array(
                'name'       =>   $candidature->nom_prenom,
                'email'      =>   $candidature->email , 
            );
            User::where('cni', $candidature->cni)->update($form_data); 
        }
        return redirect("/boursier/getCandidature");
    }




    public function destroy($id)
    {
        //
    }

    public function exportCsv(Request $request)
    {  
        $curTime = new \DateTime();
        $year= $curTime->format('Y');
        return (new CandiatureExport())->download('candiature_boursier_Excellence'.$year.'.xlsx') ; 
        // }else{
        //     return redirect()->back()->withErrors(['الرجاء تحديد مرشح واحد على الأقل']);;
        // }
            
    }

    public function sendMailTo(Request $request)
    {
        $email = $request->input("email") ; 
        $contenu = $request->input("contenu") ;
        $template_data = [
            "email" => $email ,
            "contenu" => $contenu 
        ] ;
        Mail::send("mail.sendMailTo", $template_data , function($msg) use ($email) {
            $msg->from('fm6@gmail.com') ; 
            $msg->to($email) ; 
            $msg->subject('نقص معلومة او وثيقة') ;
    
        }) ;  
        return redirect("/boursier/candidature") ; 
    }

    public function updateStatus(Request $request)
    {
        $id= $request->candidat_id;
        $candidat= Candidature::find($id);
        if($candidat->status == 'NULL'){
            $candidat->status = "accepter" ; 
        }
        elseif($candidat->status == 'accepter'){
            $candidat->status = "en attente" ; 
        }   
        elseif($candidat->status == 'en attente'){
            $candidat->status = "accepter" ; 
        }  
        $candidat->save() ; 
        return response()->json(201);
    }

    public function archiver(Request $request)
    {
        $id= $request->candidat_id;
        $candidat= Candidature::find($id); 
        $candidat->status = "archiver" ;   
        $candidat->save() ; 
        return response()->json(201);
    }

     public function valideCandidat(Request $request){
       
        //change value of valider column
        $ids = $request->input('row');  
        if(count((array)$ids)>0){
            $candidats= Candidature::whereIn('id', $ids)->get();
            foreach ($candidats as $candidat) {
                if($candidat->rib!= ''){
                    foreach ($ids as $id) {
                        $candidats= Candidature::where('id', $id)->update(['valider' => 1]); 
                    }
                    foreach ($ids as $id) {
                        $candidats= Candidature::where('id', $id)->update(['status' => 'valider']); 
                    }
            
                    $candidats= Candidature::whereIn('id', $ids)->get()->toArray(); 
                    $newDateTime = Carbon::now()->addYears(1);
                    foreach ($candidats as $candidat) {
                        //insert in table student
                        $etuduant= Student::create(
                            $candidat
                        ); 
                         
                        //insert in table bourse
                        $etudBourse= Bourse::create([
                            'anne_universitaire' => date('Y').'/'.$newDateTime->format('Y') ,
                            'cni' => $etuduant->cni,
                            'status'=> 'oui',
                            'promotion' => $etuduant->promotion,
                            ]) ; 
                           
                        
                        //insert in table fullcandidature
                        $fullCandidature= FullCandidature::create([
                            'cne' => $etuduant->cne,
                            'cni' => $etuduant->cni,
                            'nom_prenom' => $etuduant->nom_prenom,
                            'rib' => $etuduant->rib,
                            'anne_universitaire' => date('Y').'/'.$newDateTime->format('Y'),
                            'promotion' => $etuduant->promotion,
                        ]);
                    
                        //modifier les roles 
                        $utilisateur = User::where('cni', $etuduant->cni)->first();
                        $role_user= RoleUser::where('user_id',$utilisateur->id)->first();
                        $role= Role::where('titre', 'etudiant')->first();
                        $role_user->role_id= $role->id;
                        $role_user->save();
                    }
                }else{
                    return redirect()->back()->withErrors(['الرجاء إعادة التحقق من الائحة المختارة، بعض المرشحين لم يقوموا بإدخال رقم الحساب البنكي']);;
                }
            }

        
        }else{
            return redirect()->back()->withErrors(['الرجاء تحديد مرشح واحد على الأقل']);;
        }

        // return $etuduant;
        return redirect('boursier/liste');
    }

  
    function reset(Request $request , $cni )
    {   
        $candidature = Candidature::where('cni',$cni)->first() ;   
        $candidature->status = "en attente" ;  
        $candidature->valider= 0;
        $candidature->save() ; 
        return redirect('/boursier/liste') ; 
    }

    



}  