<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidature ; 
use App\Models\User ; 
use PDF;
use Dompdf\Dompdf ; 
class PdfController extends Controller
{
    //
    function getFile ()
    {
        $pdf = PDF::loadView('admin.pages.compte');
	    return $pdf->stream('ouvertureCompte.pdf');
       
    }
    
    function getFileOumniaBank ()
    {
        $pdf = PDF::loadView('admin.pages.oumnia');
	    return $pdf->stream('ouvertureCompte.pdf');
       
    }


    
}