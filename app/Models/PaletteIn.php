<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;


class PaletteIn extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [

        'name',
        'description',
        'remark',
        'batch_id',
        'unit_quantity',
    ];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function racking()
    {
        return $this->hasOne(Racking::class);
    }
}
