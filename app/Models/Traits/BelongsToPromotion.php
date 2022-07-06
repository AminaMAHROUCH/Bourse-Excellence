<?php

namespace App\Models\Traits;

use App\Models\Config;
use Illuminate\Database\Eloquent\Builder;


trait BelongsToPromotion 
{
    protected static function bootBelongsToPromotion()
    {
        static::addGlobalScope('belongs_to_promotion', function (Builder $builder) {
            $config = Config::first();
            //dd($config->promotion);
            $builder->where('promotion', $config->promotion);
        });
    }
}