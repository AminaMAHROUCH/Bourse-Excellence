<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Http\Request;
use App\Models\Stage ; 
use DB;
class StageController extends Controller
{
    //
    public function index()
    {
         $role= Auth::user()->roles('titre')->first();
        if($role->titre == 'etudiant') {
            //dd(Auth::user()->cne);
            $list = DB::table('be_stages')->where('cni', '=', Auth::user()->cni)->paginate(6); 
        }else{
            $list = Stage::join('be_students', 'be_students.cni','=','be_stages.cni')
        ->select('be_stages.*', 'be_students.nom_prenom', 'be_students.email')->paginate(6) ;  
        }
        return view("admin.pages.services.listeStage")->with('list',$list) ;
    }

    public function  show($id){
        $stage  = DB::table('be_stages')->join('be_students', 'be_students.cni','=','be_stages.cni')->where('id', '=', $id)->first();
        dd($stage);
        return view("admin.pages.services.stageDetails",compact('stage')); 
    }

    public function store(Request $request)
    { 
        $stage = new Stage() ; 
        $cni= Auth::user()->cni;
        $cne= Auth::user()->cne; 
        $stage->type =  $request->input('type_s'); 
        $stage->debut = $request->input('debut');
        $stage->fin = $request->input('fin_s'); 
        $stage->cne = $cne; 
        $stage->cni = $cni;
        $stage->ville = $request->input('ville_s');
        if($request->file('cv_file'))
        {
            $cv_file = $request->file('cv_file'); 
            $new_name = rand() . '.' . $cv_file->getClientOriginalExtension();
            $cv_file->move(storage_path('app/public/CV'), $new_name);
            $stage->cv_file  = $new_name;
        }
        $stage->explication = $request->input('explication_s');  
        $stage->save() ; 
        return redirect("/boursier/stages")  ;
    }
    
    public function update(Request $request , $id )
    {
        $item = Stage::find($id) ; 
        $item->type = $request->input('type_s') ; 
        $item->debut = $request->input('debut');
        $item->fin = $request->input('fin_s') ; 
        $item->explication = $request->input('explication_s') ; 
        $item->ville= $request->input('ville_s') ;
         if($request->file('cv_file'))
        {
            $cv_file = $request->file('cv_file'); 
            $new_name = rand() . '.' . $cv_file->getClientOriginalExtension();
            $cv_file->move(storage_path('app/public/CV'), $new_name);
            $item->cv_file  = $new_name;
        }
        $item->save() ; 
        return redirect("/boursier/stages") ; 
    }
    public function destroy(Request $request , $id )
    {
        
        $item = Stage::find( $id ) ;
        $item->delete() ;
        return redirect("/boursier/stages") ; 
    }
}