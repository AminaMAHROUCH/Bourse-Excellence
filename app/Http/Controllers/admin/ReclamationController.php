<?php

namespace App\Http\Controllers\admin ;
use App\Notifications\NewUserNotification ; 
use App\Notifications\messageNotification ;
use App\Http\Controllers\Controller ;
use Illuminate\Http\Request ;
use App\Models\Reclamation ;
use App\Models\Candidature ;
use App\Models\User ;
use App\Models\Message ;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\DB ; 
use Illuminate\Support\Facades\Response;

class ReclamationController extends Controller
{
    //
    function index() 
    {
        $role= Auth::user()->roles('titre')->first(); 
        if( $role->titre == "admin")
         
        {
            $list = Reclamation::join('be_students', 'be_students.cni','=','be_reclamations.cni')
        ->select('be_reclamations.*', 'be_students.nom_prenom', 'be_students.email')->paginate(6) ;  //recent reclamation ...
            // return $list ; 
            // if($list->reponse)
            // {
                return view("admin.pages.reclamations.listeReclamation")->with('list',$list) ; 
            // }
            // else {
            //     return view("admin.pages.reclamations.archiveReclamations")->with('list',$list) ; 
            // }
        }
        else {
            $list = Reclamation::where('cni',Auth::user()->cni)->paginate(6) ;  
        } 
        return view("admin.pages.reclamations.listeReclamation")->with('list',$list); 
    }

    public function getReclamationLues()

    { 
        $role= Auth::user()->roles('titre')->first(); 
        if( $role->titre == "admin")
        {
            $list = Reclamation::paginate(6) ; //recent reclamation ...
        }
        else {
            $list = Reclamation::where('cni',Auth::user()->cni)->paginate(6) ; 
        }
        return view("admin.pages.reclamations.archiveReclamations")->with('list',$list) ; 
    }

    public function create()
    {  
        return view("admin.pages.reclamations.formReclamation") ; 
    }

    function show($id)
    {
        $lists = Reclamation::find($id) ; 
        return view("admin.pages.reclamations.detailReclamation",compact("lists")) ;  
    }

    function store(Request $request)
    {
       $rec = new Reclamation() ;  
        $rec->cni  = Auth::user()->cni ;  
        $rec->cne  = Auth::user()->cne ;  
        if($request->input('objt')== 'آخـــــر'){
            $rec->objet = $request->input('objet') ;  
        }else{
            $rec->objet = $request->input('objt') ;  
        }
        $rec->contenu  = $request->input('text') ; 
        $rec->publier  = date('Y-m-d');  
        $rec->save() ;  
         // notification 
         if($rec){
            $admins = User::whereHas('roles', function ($query) {
                $query->where('titre', 'admin');
            })->get();
               
            \Notification::send($admins, new NewUserNotification($rec));
            
        }
        return redirect("/boursier/reclamation") ;  
    }
   function edit($id)
    {
        $lists = Reclamation::find($id) ;  
        $responses = Message::where('id_reclamation',$id)->orderBy('id', 'DESC')->paginate(6);   
        return view("admin.pages.reclamations.responseReclamation",compact("lists","responses")) ; 
    }
    public function update(Request $request , $id )
    {  
        $message = new Message() ; 
        $message->message = $request->input('reponse');  
        $message->id_user = Auth::user()->id ; 
        $message->nom_user = Auth::user()->name ; 
        $message->id_reclamation = $id ;   
        $message->save() ; 
      
        return back() ; 
    }

    public function destroy(Request $request , $id )
    { 
        $messages = Message::where('id_reclamation',$id)->get() ; 
        foreach($messages as $message) 
        {
            $message->delete() ; 
        }
        return redirect("/boursier/reclamationArchivees") ;  
    } 

    public function closeReclamation($id)
    { 
        $reclamation = Reclamation::where('id',$id)->first() ; 
        if($reclamation->status == "مغلقة") {
            $reclamation->status = "مفتوحة" ; 
        }
        else {
            $reclamation->status = "مغلقة" ;
            //Auth::user()->notify(new reclamationNotification($reclamation)) ;
        } 
        $reclamation->save() ; 
        return back() ; 
    }
    
}