<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use App\Models\Traits\BelongsToScholarYear;
use App\Models\Traits\BelongsToPromotion;

class Exception extends Model  
{
    use HasFactory;
    use BelongsToScholarYear;
    use BelongsToPromotion;
    
    public $table = 'be_exceptions'; 
      
}