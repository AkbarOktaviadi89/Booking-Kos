<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    /** @use HasFactory<\Database\Factories\BonusFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable =  [
        'boarding_house_id',
        'name',
        'image',
        'description',
    ];
}
