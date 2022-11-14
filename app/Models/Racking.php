<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Racking extends Model
{
    use HasFactory;

    protected $fillable = [

        'palette_id',
        'section',
        'row',
        'column',
    ];

    public function palette()
    {
        return $this->belongsTo(Palette::class);
    }
}
