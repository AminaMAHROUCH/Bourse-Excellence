<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class Stage extends Model  implements Searchable
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'be_stages';

    // protected $dates = [
    //     'debut',
    //     'fin',
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    // ];

    // protected $fillable = [
    //     'type',
    //     'debut',
    //     'fin', 
    //     'cne',
    //     'cni',
    //     'explication',
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    // ];

    // public function getDebutAttribute($value)
    // {
    //     return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    // }

    // public function setDebutAttribute($value)
    // {
    //     $this->attributes['debut'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    // }

    // public function getFinAttribute($value)
    // {
    //     return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    // }

    // public function setFinAttribute($value)
    // {
    //     $this->attributes['fin'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    // }

    // protected function serializeDate(DateTimeInterface $date)
    // {
    //     return $date->format('Y-m-d H:i:s');
    // }
    public function getSearchResult(): SearchResult
    {
       $url = url('/boursier/stages', $this->id);
    
       return new \Spatie\Searchable\SearchResult(
        $this,
       $this,
       $url
    );
    }
}