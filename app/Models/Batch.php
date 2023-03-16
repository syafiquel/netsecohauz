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
        'no',
        'description',
        'remark',
        'brand_owner_id',
        'unit_quantity',
        'product_quantity',
        'bundle_quantity',
        'carton_quantity_in',
        'carton_quantity_out',
        'palette_quantity_in',
        'palette_quantity_out',
        'production_at',
        'manufactured_at',
        'expired_at',
        'status',
        'image'
    ];

    public function brand_owner()
    {
        return $this->belongsTo(BrandOwner::class);
    }

    public function batch_operation()
    {
        return $this->hasOne(BatchOperation::class);
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
