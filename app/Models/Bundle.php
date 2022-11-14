<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'description',
        'remark',
        'unit_id',
        'quantity'
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
