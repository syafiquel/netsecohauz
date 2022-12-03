<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'group_name',
        'description',
        'remark',
        'brand_owner_id',
        'unit_quantity',
        'manufactured_at',
        'expired_at',
        'status'
    ];

    public function brand_owner()
    {
        return $this->belongsTo(BrandOwner::class);
    }
}
