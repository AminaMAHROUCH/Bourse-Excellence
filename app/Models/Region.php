<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface; 
class Region extends Model  
{
    use SoftDeletes;

    public $table = 'be_regions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function uniteRegionals()
    {
        return $this->hasMany(UniteRegional::class, 'region_id');
    }

    public function partnersRegionals()
    {
        return $this->hasMany(ProvincePartner::class, 'region_id');
    }

    public function provinces()
    {
        return $this->hasMany(Province::class, 'region_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function question()
    {
        return $this->hasMany(Question::class, 'region_id');
    }
 
}