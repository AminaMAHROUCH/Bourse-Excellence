<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intermediaire extends Model
{
    use HasFactory;
    public $table = "be_intermediaires" ; 

    protected $fillable = [
        'nom_prenom',
        'cni',
        'rib',
        'anne_universitaire',
        'promotion',
        'code',
        'montant',
    ];
}