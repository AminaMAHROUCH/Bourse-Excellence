<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class Formation extends Model  implements Searchable
{
    use HasFactory;
    public $table = 'be_formations'; 
    public function getSearchResult(): SearchResult
    {
       $url = url('/boursier/formations', $this->id);
    
       return new \Spatie\Searchable\SearchResult(
        $this,
       $this,
       $url
    );
    }
}