<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CandidatureController;
use App\Http\Controllers\admin\FormationController ;
use App\Http\Controllers\admin\StageController ;
use App\Http\Controllers\admin\ReclamationController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\RenouvellementController ;
use App\Http\Controllers\admin\ActualiteController ;
use App\Http\Controllers\admin\DashboardController ;
use App\Http\Controllers\admin\PdfController ;
use App\Http\Controllers\admin\ArchiveController ; 
use App\Http\Controllers\jobs\SendEmailJob ; 
use App\Http\Controllers\admin\PermissionsController ;
use App\Http\Controllers\admin\RolesController ;
use App\Http\Controllers\admin\UsersController ;
use App\Http\Controllers\admin\ChartDataController;
use App\Http\Controllers\admin\FullCandidatureController ;
use App\Http\Controllers\admin\ContoroleController ; 
use App\Http\Controllers\admin\PageVisiteurController ; 
use App\Http\Controllers\admin\MarketController ; 
use App\Http\Controllers\admin\ConfigController;
use App\Models\FullCandidature;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/symlink', function () {
   Artisan::call('storage:link');
    
 });
Route::get('/',[PageVisiteurController::class, 'maquerInscBtn']);
Auth::routes(['register' => false]);
//Student Route
Route::get('etudiant/dropdownlistProvince', [CandidatureController::class, 'dropdownProvince'])->name('etudiant.dropdownlistProvince');
Route::post("etudiant/check", [CandidatureController::class,'Check'])->name('etudiant.check');
Route::post("candidature/store", [CandidatureController::class,'store'])->name('candidature.store');
Route::post("candidature/validate", [CandidatureController::class,'validateCondidature'])->name('candidature.validate');
Route::post("candidature/validateUpdate", [CandidatureController::class,'validateCondidatureUpdate'])->name('candidature.validateUpdate');


Route::get('/compteBancaire' , [PdfController::class,"getFile"]) ;
Route::get('/compteOumnia' , [PdfController::class,"getFileOumniaBank"]) ;
Route::post('addRiB' , [CandidatureController::class,"addRIB"])->name('addRiB');


Route::group(['prefix' => 'boursier', 'as' => 'boursier.', 'middleware' => ['auth']], function () {
    Route::get('dropdownlistProvince', [CandidatureController::class, 'dropdownProvince'])->name('etudiant.dropdownlistProvince');
    //dashboard
    Route::get('dashboard', [DashboardController ::class, 'index'])->name('home');
    Route::put("/actualite/{id}" , [DashboardController::class,"update"]);
 
    // Permissions
    Route::resource('permissions', PermissionsController::class);

    // Roles 
    Route::resource('roles', RolesController::class);


    // Users
    Route::resource('users', UsersController::class);

    //Actualite
    
    Route::resource("actualites" ,  ActualiteController::class) ;
    //Route::get('actualites', [ActualiteController::class, 'index'] );
    // candidature
    Route::get('getCandidature', [CandidatureController::class, 'getCandidature'])->name('getCandidature');
    Route::get('candidature', [CandidatureController::class, 'index'] );
    Route::get('liste', [CandidatureController::class, 'index'] );
    Route::get('pdf', [CandidatureController::class, 'indexPdfPage'] );
    Route::put('candidature/{id}', [CandidatureController::class, 'update'] )->name('update');
    Route::get('candidature/show/{id}', [CandidatureController::class, 'show'] )->name('show');
    Route::get('exportCsv', [CandidatureController::class, 'exportCsv'] )->name('exportCsv');
    Route::post("sendMailTo",[CandidatureController::class, 'sendMailTo']) ;  
    Route::post("sendMailGlobal",[CandidatureController::class, 'sendMailGlobal']) ; 
    Route::get('updateStatus', [CandidatureController::class, 'updateStatus'] )->name('updateStatus');
    Route::get('archiver', [CandidatureController::class, 'archiver'] )->name('archiver');
    Route::get('valideCandidat', [CandidatureController::class, 'valideCandidat'])->name('valideCandidat');


    //Reclamations
    Route::resource("reclamation",ReclamationController::class);
    Route::get("/reclamationArchivees",[ReclamationController::class,'getReclamationLues']);
    Route::put('/clotureReclamation/{id}',[ReclamationController::class,"closeReclamation"])->name("close");
    //Renouvellement
    Route::get("/renouvellant",[RenouvellementController::class,'index']) ;
    Route::get("reinscription/modification",[RenouvellementController::class,'getRenouvellement']) ;
    Route::get("reinscription", [RenouvellementController::class,'create']);
    Route::post("/reinscription",[RenouvellementController::class,'store']);
    Route::put("reinscription/modification",[RenouvellementController::class,'update'])->name("renouvUpdate");
    Route::get("renouvellement/show/{id}",[RenouvellementController::class,'show']);
    Route::post("sendMail",[RenouvellementController::class, 'sendMail'])->name('send'); 
    Route::get('renouvellement/archiver', [RenouvellementController::class, 'archiver'] );
    Route::get('renouvellement/exception', [RenouvellementController::class, 'exception'] )->name('exception');
    Route::get('renouvellement/accepter', [RenouvellementController::class, 'accepter'] )->name('accepter');

   

    //service
    Route::get("demandes/service",function(){
        return view ("admin.pages.services.demandeService") ;
    });
  
    //Stage
    Route::get("/stages",[StageController::class,'index']) ;
    Route::get("/stages/{id}",[StageController::class,'show']) ;
    Route::post("demandeStage",[StageController::class,'store'])->name("stage") ;
    Route::delete("demandeStage/{id}",[StageController::class,'destroy'])->name("suppressionStage");
    Route::put("demandeStage/{id}",[StageController::class,'update'])->name("demande");
 
    //formation
    Route::get('formations',[FormationController::class,"index"]) ;
    Route::get("/formations/{id}",[FormationController::class,'show']) ;
    Route::delete('formations/{id}',[FormationController::class,"destroy"])->name('suppressionFormation') ;
    Route::post("/demandeFormation",[FormationController::class,'store'])->name("formation") ;
    /* ajout de la route de update formation*/ 
    Route::put("formations/{id}",[FormationController::class,'update'])->name('editer');
    // Route::post("/demandeFormationDash",[FormationController::class,'store'])->name("formation") ;
    //student
    Route::get("etudiant/liste",[StudentController::class,'index']) ;
    Route::get("etudiant/details/{id}",[StudentController::class,'show']) ;
    Route::get("etudiant/send" ,  [StudentController::class,'sendMailGlobal']) ;
    Route::get("etudiant/SendMail" ,  [StudentController::class,'SendMail'])->name('etudiant.SendMail') ;


    // Route::get("etudiant/profileChange/{id}",[StudentController::class,'index']) ;
    Route::get("etudiant/profile" ,[StudentController::class,'getEtudiantInfo']) ;
    Route::get("etudiant/profile/modification" ,[StudentController::class,'getEtudiantInfoToUpdate'])->name('modification') ;
    Route::put("etudiantChange/{id}" ,[StudentController::class,'update']);
    // Route::get("etudiant/details/{id}" ,[StudentController::class,'show']) ;

    Route::get("etudiant/etude" , function(){
        return view('etudiants.pages.informations.inofEtud') ;
    }) ; 

    //document
    
 

    // full candidature
    Route::get("finance",[FullCandidatureController::class,'index']) ;  
    Route::get("panier",[FullCandidatureController::class,'panier'])->name('panier') ;  
    Route::get("/addPanier",[FullCandidatureController::class,'addPanier'])->name('addPanier') ;  
    Route::get("sendToPanier/{type}",[FullCandidatureController::class,'sendToPanier']) ; 
    Route::post("finance/close/{id}",[FullCandidatureController::class,'close'])->name('finance.close') ;
    Route::delete("intemidiare/destroy/{id}",[FullCandidatureController::class,'destroy'])->name('intemidiare.destroy') ;
    Route::get("editPanier/{id}",[FullCandidatureController::class,'editPanier'])->name('editPanier') ;
    Route::get("/deleteIntermidiare",[FullCandidatureController::class,'delete'])->name('deleteIntermidiare') ; 
    Route::put("updatePanier/{id}",[FullCandidatureController::class,'updatePanier'])->name("updatePanier");
    Route::post("addMonatnt",[FullCandidatureController::class,'addMonatnt'])->name("addMonatnt");
    Route::put("addfile/{id}",[FullCandidatureController::class,'addFile'])->name("addfile");
    Route::put("annulerPanier/{id}",[FullCandidatureController::class,'annulerPanier'])->name("annulerPanier");
    Route::get("downloadFile/{paiment}",[FullCandidatureController::class,'downloadFile']);
    Route::put("AddAvisSort/{id}",[FullCandidatureController::class,'addAvisSort'])->name("AddAvisSort");

    

   // Route::resource("/panier", FullCandidature::class)->only(['store']);

    //Route::get('/admin/etudiant/archive', [CandidatureController::class,"index"]);

    //pdf 
    Route::get('/getPDF' , [PdfController::class,"getFile"]) ;
    // archive
    Route::get('archive',[ArchiveController::class,'index']) ; 
    Route::get('getArchive/{id}',[ArchiveController::class,'show']) ;

    //search
    Route::get('/search', [DashboardController::class, 'search'])->name('search');
    Route::get('/liste', [CandidatureController::class, 'index'])->name('liste');
     


    // searchStudent 
    Route::get('/searchMaster',[StudentController::class,'searchInfo'])->name('searchMaster') ; 
    Route::get('/detailSearch/{id}',[StudentController::class,'showSearch']) ; 


    // paiement 
    // Route::get('/demande/paiement',function(){
    //     return view('admin.pages.paiement.paiement') ; 
    // }) ; 

    Route::get('/demande/paiement',[FullCandidatureController::class,'index']);

    
    // setting 
    Route::get('/setting',[ContoroleController::class, 'index']) ; 
    Route::put('/setting/{id}',[ContoroleController::class, 'updateAction']) ; 
    Route::get('/setting/{id}/desactiver',[ContoroleController::class, 'des']) ;
    // cloture reclamation
    Route::put('/clotureReclamation/{id}',[ReclamationController::class,"closeReclamation"])->name("close");
    //market 
    Route::get('/market/demandes',[MarketController::class,'demandsGet']) ; 
    Route::get('/market/promotions',[MarketController::class,'promotionsGet']) ; 
    Route::get('/market/create',[MarketController::class,'index']) ;
    Route::post('/market/store',[MarketController::class,'store']) ; 
    Route::get('/market/forum/demandes/{id}',[MarketController::class,'showDemande']) ; 
    Route::get('/market/forum/promotions/{id}',[MarketController::class,'showPromotion']) ;
    Route::post('/market/forum/add/{id}',[MarketController::class,'forumAdd']) ; 
    // notifications 
    Route::get('/notification/read',function(){ // make all notifications read 
         Auth::user()->unreadNotifications->markAsRead() ; 
         return redirect()->back() ; 
    }) ; 
});

Route::get("/z",function(){
    $tab =  Auth::user()->unreadNotifications ;
    for ($i = 0 ; $i<count($tab) ; $i++) {
        if($tab[$i]->notifiable_id == 1 )
            echo $tab[$i]."<br>" ;
        else
            echo "a"."<br>"  ;    
    } 
}) ; 
Route::get('/archiveListe',function(){
    return view("admin.pages.reclamations.archiveReclamations") ; 
}) ;  
Route::get('/a',function(){
    return view("admin.pages.archives.archiveDetail") ; 
}) ;  




//test 
Route::get('/test-22' , function() {
    dd(exec('home/public_html/amefmaroc/artisan inspire')); 
});


//test 
Route::get('/list' , function() {
    return view('admin.pages.listes.list') ; 
}) ; 
Route::get('/pdfpage', [CandidatureController::class, 'indexPdfPage']);

 // ///chart test
    Route::get('/get-post-chart-data', [ChartDataController::class,'getRegionCandidatData']);
    //Route::get("/testChart",[ChartDataController::class,'getAllRegions']);

     // reset candidature
     Route::get('reset/{cni}',[CandidatureController::class, 'reset']); 
        Route::get('boursier/statistics' , function() {
        return view('PublicChart') ;
    }) ;
    Route::get('/test/chart',[ChartDataController::class,'getRegionCandidatData'])->name('test.chart');
         Route::get('/test/provinces',[ChartDataController::class,'getProvinceCandidatData']);
     Route::get('/test/genders',[ChartDataController::class,'getGenderCandidatData']);
     Route::get('/test/notes',[ChartDataController::class,'getNoteCandidatData']);
     Route::get('/test/reussite',[ChartDataController::class,'getReussiteCandidatData']);
     Route::get('/test/ages',[ChartDataController::class,'getAgeCandidatData']);
    
        Route::post('config',[ConfigController::class,'store'])->name('config');
