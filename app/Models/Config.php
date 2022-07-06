<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    public $table = 'configs';

    protected $fillable = [
        'anne_universitaire',
        'promotion',
    ];
}