<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomImage extends Model
{
    /** @use HasFactory<\Database\Factories\RoomImageFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable =  [
        'room_id',
        'image',
    ];

    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function boardingHouse(){
        return $this->belongsTo(BoardingHouse::class);
    }

}
