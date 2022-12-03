<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Batch extends Model
{
    use HasFactory, Uuids;

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
