<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable =  [
        'image',
        'name',
        'slug'
    ];

    public function boardingHouses(){
        return $this->hasMany(BoardingHouse::class);
    }
}
