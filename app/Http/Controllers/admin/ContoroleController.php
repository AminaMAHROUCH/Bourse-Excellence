<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contorole;
class ContoroleController extends Controller
{
    //
    public function index() 
    {
        $controles = Contorole::all() ; 
        return view('admin.pages.setting.setting',compact('controles')) ; 
    }
    public function updateAction($id ,Request $request)
    {
       
        $controles = Contorole::find(1) ;
        $controles->start_at=$request->input('start'); 
        $controles->end_at= $request->input('end'); 
        $controles->save() ; 
        return redirect()->back() ; 
    }
}