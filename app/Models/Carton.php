<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carton extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'description',
        'remark',
        'bundle_id',
        'quantity'
    ];

    public function bundle()
    {
        return $this->belongsTo(Bundle::class);
    }
}