<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable =  [
        'boarding_house_id',
        'name',
        'room_type',
        'square_feet',
        'capacity',
        'price_per_month',
        'is_available',
    ];

    public function boardingHouse(){
        return $this->belongsTo(BoardingHouse::class);
    }

    public function images(){
        return $this->hasMany(RoomImage::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class); 
    }
}
