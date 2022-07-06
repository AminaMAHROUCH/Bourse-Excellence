<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Candidature;
use App\Models\Renouvellement;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    //
    public function index()
    {
        $candidats= Candidature::where('status', 'archiver')->get();
        $etudiantRejeters= Renouvellement::where('status', 'archiver')->get();
        //$etudiantException= Renouvellement::where('status', 'exception')->get();
        return view("admin.pages.archives.archiveEtudiant", compact('candidats', 'etudiantRejeters'));
    }
    public function show($id)
    {
        return view("admin.pages.archives.archiveDetail") ; 
    }
}