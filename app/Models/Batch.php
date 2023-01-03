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
        'description',
        'remark',
        'brand_owner_id',
        'unit_quantity',
        'bundle_quantity',
        'carton_quantity',
        'palette_quantity',
        'manufactured_at',
        'expired_at',
        'status'
    ];

    public function brand_owner()
    {
        return $this->belongsTo(BrandOwner::class);
    }

    public function racking()
    {
        return $this->hasOneThrough(
            Racking::class,
            Palette::class,
            'batch_id',
            'palette_id',
            'id',
            'id'
        );
    }
}
