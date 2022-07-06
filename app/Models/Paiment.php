<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\BelongsToScholarYear;
use App\Models\Traits\BelongsToPromotion;
use Carbon\Carbon;



class Paiment extends Model
{
    use HasFactory;
    use BelongsToScholarYear;
    use BelongsToPromotion;

    public $table = "be_paiments" ; 

    protected $fillable = [
        'numero_panier',
        'date_creation',
        'date_panier',
        'compte_debiter',
        'intitule_compte',
        'numero_operation',
        'etat',
        'demande',
        'total',
        'detail',
        'user_name',
        'anne_universitaire',
        'promotion'
    ];

// public function getDatePanierAttribute($value)
//     {
//         $date = Carbon::parse($value);
//         return $date->format('d-m-Y');
//     }
    public function markAsPaid()
    {
        return tap($this)->update([
            'etat' => 'مرفوعة'
        ]);
    }
}