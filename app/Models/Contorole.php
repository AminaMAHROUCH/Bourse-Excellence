<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contorole extends Model
{
    use HasFactory;
    public $table = 'be_controles';

    protected $fillable = [
        'nom_fonction',
        'action',
    ];
}