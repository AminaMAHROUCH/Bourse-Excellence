<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPdf extends Model
{
    use HasFactory;
    public $table = 'data_pdf';

    protected $fillable = [
        'cni',
        'nom_prenom_ar',
        'nom_prenom_fr',
        'rib',
        'montant',
        'province',
    ];


 

 
}