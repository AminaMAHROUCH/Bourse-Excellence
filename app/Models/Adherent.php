<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class Adherent extends Model  implements Searchable
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'be_adherent';

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'cni',
        'full_name',
        'matricule',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function getSearchResult(): SearchResult
    {
       $url = route('boursier.show', $this->id);
    
       return new \Spatie\Searchable\SearchResult(
        $this,
       $this,
       $url
    );
    }
}