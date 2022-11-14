<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palette extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'description',
        'remark',
        'carton_id',
        'quantity'
    ];

    public function carton()
    {
        return $this->belongsTo(Carton::class);
    }
}
