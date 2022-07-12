<?php

namespace App\Http\Controllers\admin;
// -Xmx1024M
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formation ; 
use Illuminate\Support\Facades\Auth ;
class FormationController extends Controller
{
    //
    public function index (){ 
         $role= Auth::user()->roles('titre')->first();
        if($role->titre == 'etudiant') {
            //dd(Auth::user()->cni);
            $list = Formation::where('cni', Auth::user()->cni)->paginate(6); 
        }else{
        $list = Formation::join('be_students', 'be_students.cni','=','be_formations.cni')
        ->select('be_formations.*', 'be_students.nom_prenom', 'be_students.email')->paginate(6) ; 
        }
        // return $list ; 
        return view("admin.pages.services.listeForamtion")->with("list",$list) ;  
    }

    public function store(Request $request)
    { 
        $formation = new Formation() ; 
        $cni= Auth::user()->cni;
        $cne= Auth::user()->cne;
        $formation->cne = $cne ;
        $formation->cni = $cni ; 
        $formation->debut = $request->input('debut');
        $formation->fin = $request->input('fin_s'); 
        $formation->titre_formation = $request->input('titre_formation') ;
        if($request->input('type_f')== 'آخـــــر'){
            $formation->type = $request->input('type_formation') ;
        }else{
            $formation->type = $request->input('type_f') ;
        }
        $formation->explication = $request->input('detail_f') ;
        $formation->save() ; 
        return redirect("/boursier/formations")  ; 
    }
    function destroy(Request $request , $id )
    {
        $item = Formation::find($id) ; 
        $item->delete() ; 
        return redirect("/boursier/formations")  ; 
    }
    public function  show($id){
        $formation  = Formation::find($id) ; 
        return view("admin.pages.services.formationDetails",compact('formation')); 
    }
    // éditer une formation
    public function update(Request $request , $id )
    {
        $item = Formation::find($id) ; 
        $item->titre_formation = $request->input('type_f') ;  
        $item->explication = $request->input('explication_f') ; 
        $item->save() ; 
        return redirect("/boursier/formations") ; 
    }

 
}