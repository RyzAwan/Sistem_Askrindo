<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'productions_date',
        'user_id',
        'a1_deb',
        'a1_amount',
        'a2_deb',
        'a2_amount',
        'a3_deb',
        'a3_amount',
        'a4_deb',
        'a4_amount',
        'a5_deb',
        'a5_amount',
    ];

}
