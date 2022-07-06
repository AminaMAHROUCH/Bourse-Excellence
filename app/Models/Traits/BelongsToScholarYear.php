<?php

namespace App\Models\Traits;

use App\Models\Config;
use Illuminate\Database\Eloquent\Builder;

trait BelongsToScholarYear 
{
    protected static function bootBelongsToScholarYear()
    {
        static::addGlobalScope('belongs_to_scholar_year', function (Builder $builder) {
            $config = Config::first();
            $builder->where('anne_universitaire', $config->anne_universitaire);
        });
    }
}