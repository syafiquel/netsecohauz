<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';

    protected $fillable = [

        'user_id',
        'phone',
        'department',
        'address_1',
        'address_2',
        'city',
        'state',
        'postcode',
        'country',
        'first_name',
        'last_name',
    ];
}
