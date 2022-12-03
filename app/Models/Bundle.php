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
        'batch_id',
        'quantity'
    ];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
