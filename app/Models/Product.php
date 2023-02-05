<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'industry_id',
        'category_id',
        'brand_owner_id'
    ];

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function brand_owner()
    {
        return $this->belongsTo(BrandOwner::class);
    }
}
