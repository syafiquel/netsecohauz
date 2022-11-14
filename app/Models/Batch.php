<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'description',
        'remark',
        'palette_id',
        'brand_owner_id',
        'palette_quantity',
        'status'
    ];

    public function palette()
    {
        return $this->belongsTo(Palette::class);
    }

    public function brand_owner()
    {
        return $this->belongsTo(BrandOwner::class);
    }
}
