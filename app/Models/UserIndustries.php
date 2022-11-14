<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIndustries extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_owner_id',
        'industry_id'
    ];
}
