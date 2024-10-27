<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
 protected $table = 'places';
    protected $fillable = [
        'name',
        'description',
        'location',
        'climate',
        'image_url',
        'video_url',
        'google_maps',
        'category',
        'latitude',
        'longitude',
        'services', // Incluye 'services' si es necesario
        'opening_time',
        'closing_time',
        'price_range',
        'contact_number',
        'email',
    ];
}
