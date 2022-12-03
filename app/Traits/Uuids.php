<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

trait Uuids
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) 
        {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }
}