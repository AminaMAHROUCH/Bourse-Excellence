<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidature ; 
use App\Models\Panier ; 
use App\Models\User ; 
use App\Models\DataPdf ; 
use PDF;
use Dompdf\Dompdf ; 
use DB;
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
    
       function getFilePDF($num_panier)
    {
        $panier= Panier::where('num_panier', $num_panier)->first();
        //$datapdf= DataPdf::where('code', $num_panier)->get();
        $datapdf= DB::table('data_pdf')
        ->join('be_students', 'be_students.cni','data_pdf.cni' )
        ->join('be_regions', 'be_regions.id', 'be_students.region_id_etud')
        ->join('be_provinces', 'be_provinces.id', 'be_students.province_id_etud')
->select('data_pdf.*', 'be_regions.nom_region', 'be_provinces.nom_province')->where('data_pdf.code', $num_panier)->get();
        
        $countData= DataPdf::where('code', $num_panier)->count();
        $montant_global= DataPdf::where('code', $num_panier)->sum('montant');
    
        return view('admin.pages.paiement.benificiareList', compact( 'datapdf' ,
        'countData', 
        'montant_global' ,
        'num_panier' ,
        'panier'   ));
       
    }


    
}