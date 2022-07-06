<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\BelongsToScholarYear;
use App\Models\Traits\BelongsToPromotion;


class Panier extends Model
{
    use HasFactory;
    use BelongsToScholarYear;
    use BelongsToPromotion;
    public $table = "be_paniers" ; 
}