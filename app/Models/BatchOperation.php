<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchOperation extends Model
{
    use HasFactory;

    protected $fillable = [

        'batch_id',
        'operation_team_id',
        'remark'    
    ];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
