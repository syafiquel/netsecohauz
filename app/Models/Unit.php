<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'description',
        'remark',
        'brand_owner_id',
        'quantity'
    ];

    public function brand_owner()
    {
        return $this->belongsTo(BrandOwner::class);
    }
}
