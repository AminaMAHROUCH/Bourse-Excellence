<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contorole; 

class PageVisiteurController extends Controller
{
    //
    public function maquerInscBtn() 
    {
        $candidature = Contorole::where('nom_fonction','استمارة الترشيح')->first() ;  
        return view('pageAcceuil',compact('candidature')) ; 
    }
}