<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class Archive extends Model  implements Searchable
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'archives';

    protected $appends = [
        'attestation_bac',
        'relves_notes',
        'salaire',
    ];

    protected $dates = [
        'date_naissance',
        'anne_bac',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cne',
        'cni',
        'full_name',
        'adresse',
        'email',
        'telephone_1',
        'telephone_2',
        'full_name_f',
        'full_name_m',
        'adresse_parents',
        'date_naissance',
        'lieu_naissance',
        'situation',
        'sex',
        'photo',
        'profession_f',
        'tel_f',
        'tel_m',
        'universite',
        'school',
        'profession_m',
        'anne_bac',
        'note',
        'AttestationBac',
        'RelvesNote',
        'attestProfessionP',
        'salaire',
        'type',
        'justification',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function getDateNaissanceAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateNaissanceAttribute($value)
    {
        $this->attributes['date_naissance'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getAnneBacAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAnneBacAttribute($value)
    {
        $this->attributes['anne_bac'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

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