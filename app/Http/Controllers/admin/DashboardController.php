<?php

namespace App\Http\Controllers\admin; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Actualite ;
use App\Models\Candidature;
use App\Models\User;
use App\Models\Adherent;
use App\Models\Archive;
use App\Models\Exception;
use App\Models\Formation;
use App\Models\FullCandidature;
use App\Models\Province;
use App\Models\Reclamation;
use App\Models\Region;
use App\Models\Renouvellement;
use App\Models\Stage;
use App\Models\Notification;
use App\Models\Student; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Searchable\Search;
use DB;

class DashboardController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    function index()
    {
        //abort_if(Gate::denies('dashboard_acces'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $notifications = auth()->user()->unreadNotifications;
        $ligne = Actualite::orderBy("created_at",'desc')->paginate(3) ;  
        $role= Auth::user()->roles('titre')->first();
        if($role->titre == 'etudiant') {
            $total= FullCandidature::withoutGlobalScopes()->where('cni', Auth::user()->cni)->sum('montant');
            if($total== 50000.00){
                return view('admin.pages.Error');
            }
            return view('admin.pages.dashboardEtudiant', compact('notifications', 'ligne'));
        }elseif($role->titre == 'candidat') {
             return redirect('/boursier/getCandidature');
        }else{
            return view('admin.pages.dashboardAdmin', compact('notifications'));
        }
    }
    function update (Request $request , $id)
    {
        $Actualite = Actualite::find($id) ; 
        $Actualite->is_read = "read" ; 
        $Actualite->save() ; 
        return redirect('/boursier/dashboard');
    }


    public function markNotification(Request $request)
    {
        $id= $request->renouvllement_id; 
        $notification= DB::table('notifications')->where('id', $id)->update(['read_at'=> now()]);
        return back();
    }

    public function search( Request $request)
    {
 
        $searchterm = $request->input('query');
 
        $searchResults = (new Search())
                    ->registerModel(Candidature::class, 'cne','cni','nom_prenom','adresse','email','telephone_1','telephone_2','nom_prenom_adherent','nom_prenom_conjoint','adresse_parents','date_naissance','lieu_naissance','situation_familiale','sexe','profession_adherent','telephone_pere','telephone_mere','universite','ecole','etat_physique','filiere','anneUniversitaire','profession_conjoint','matricule','cni_adherent','mention','anne_bac','note','nbr_freres','parents_deces','dateInscription','status')
                    ->registerModel(User::class, 'name', 'email', 'cne','cni') 
                    ->registerModel(Adherent::class, 'cni', 'nom_prenom_adh', 'matricule')
                    ->registerModel(Exception::class, 'cne', 'cni', 'nom_prenom','universite','annee_universitaire','ecole','filiere','nbre_exception','status','boursier','promotion')
                    ->registerModel(Formation::class, 'cne', 'cni', 'titre_formation','explication')
                    ->registerModel(FullCandidature::class, 'cne', 'cni', 'anne_universitaire','promotion','status') 
                    ->registerModel(Reclamation::class, 'cne', 'cni', 'objet','contenu','reponse','publier')
                    ->registerModel(Renouvellement::class,'nom_prenom','cne','cni','universite','ecole','justification','numero_compte','status')
                    ->registerModel(Stage::class, 'type','debut','fin','cne','cni','ville','explication')
                    ->registerModel(Student::class,'cne','cni','nom_prenom','adresse','email','telephone_1','telephone_2','nom_prenom','adresse_parents','date_naissance','lieu_naissance','situation_familiale','sexe','profession_adherent','telephone_pere','telephone_mere','universite','ecole','etat_physique','anneUniversitaire','profession_conjoint','matricule','cni_adherent','mention','anne_bac','note','nbr_freres','parents_deces','dateInscription','status','valider') 
                    ->perform($searchterm);
              
         return view('admin.pages.search', compact('searchResults', 'searchterm'));
    }
    // public function markNotification(Request $request)
    // {
    //     auth()->user()
    //         ->unreadNotifications
    //         ->when($request->input('id'), function ($query) use ($request) {
    //             return $query->where('id', $request->input('id'));
    //         })
    //         ->markAsRead();

    //     return response()->noContent();
    // }
}