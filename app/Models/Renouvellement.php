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

class Renouvellement extends Model  implements Searchable
{
    use SoftDeletes;
    use HasFactory;
    use BelongsToScholarYear;
    use BelongsToPromotion;

    public $table = 'be_renouvellements';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cne',
        'cni',
        'universite',
        'school',
        'AttestationBac',
        'RelvesNote',
        'attestProfessionP',
        'salaire',
        'justification',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function cne()
    {
        return $this->belongsTo(Student::class, 'cne_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function getSearchResult(): SearchResult
    {
        $url = url('/boursier/renouvellement/show', $this->id);
    
       return new \Spatie\Searchable\SearchResult(
        $this,
       $this,
       $url
    );
    }
}