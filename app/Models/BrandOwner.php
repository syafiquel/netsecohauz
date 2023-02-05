<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandOwner extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'phone',
        'address_1',
        'address_2',
        'city',
        'state',
        'postcode',
        'country',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function industry()
    {
        return $this->hasManyThrough(
            // required
            'App\Models\Industry', // the related model
            'App\Models\UserIndustries', // the pivot model

            // optional
            'brand_owner_id', // the current model id in the pivot
            'id', // the id of related model
            'id', // the id of current model
            'industry_id' // the related model id in the pivot
        );
    }
}
