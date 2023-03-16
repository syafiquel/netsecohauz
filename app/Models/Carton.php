<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Carton extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [

        'name',
        'description',
        'remark',
        'batch_id',
        'unit_quantity',
        'product_quantity',
        'production_in_at',
        'production_out_at'
    ];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
