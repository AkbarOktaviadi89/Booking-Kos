<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    /** @use HasFactory<\Database\Factories\BonusFactory> */
    use HasFactory;

    protected $fillable =  [
        'boarding_house_id',
        'name',
        'image',
        'description',
    ];
}
