<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    /** @use HasFactory<\Database\Factories\TestimonialFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable =  [
        'name',
        'boarding_house_id',
        'photo',
        'content',
        'rating',
    ];

    public function boardingHouse(){
        return $this->belongsTo(BoardingHouse::class);
    }
}
