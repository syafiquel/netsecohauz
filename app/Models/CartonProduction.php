<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartonProduction extends Model
{
    use HasFactory;

    protected $fillable = [

        'carton_id',
        'status',
        'remark'    
    ];

    public function carton()
    {
        return $this->belongsTo(Carton::class);
    }
}
