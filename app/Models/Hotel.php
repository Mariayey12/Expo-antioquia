<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'rating',
        'description',
        'price_per_night',
        'phone_number',
        'email',
        'website',
        'capacity',
        'services',
        'image_url',
        'latitude',
        'longitude',
        'category',
    ];

    public function relaxationPlaces()
    {
        return $this->hasMany(RelaxationPlace::class);
    }

    public function touristPlaces()
    {
        return $this->hasMany(TouristPlace::class);
    }
}
