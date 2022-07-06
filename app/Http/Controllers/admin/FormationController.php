<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formation ; 
use Illuminate\Support\Facades\Auth ;
class FormationController extends Controller
{
    //
    public function index (){ 
        $list = Formation::paginate(6) ; 
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
        $formation->titre_formation = $request->input('type_f') ;
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