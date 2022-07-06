<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use App\Models\Traits\BelongsToScholarYear;
use App\Models\Traits\BelongsToPromotion;

class FullCandidature extends Model  //implements Searchable
{
    use SoftDeletes;
    use HasFactory;
    use BelongsToScholarYear;
    use BelongsToPromotion;

    public $table = 'be_etudiant_boursiers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'cne',
        'cni',
        'nom_prenom',
        'anne_universitaire',
        'status',
        'promotion',
        'rib',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function cni()
    {
        return $this->belongsTo(Candidature::class, 'cni_id');
    }
/*
    public function getAnneAttribute()
{
    return $this->anne_universitaire->format('Y');
}
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function getSearchResult(): SearchResult
    {
       $url = url('/boursier/candidature/show/', $this->id);
    
       return new \Spatie\Searchable\SearchResult(
        $this,
       $this,
       $url
    );
    }*/
}