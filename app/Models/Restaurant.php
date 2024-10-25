<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'image_url',
        'google_maps',
        'latitude',
        'longitude',
        'phone_number',
        'email',
        'website',
        'average_price',
        'menu',
        'services',
        'video_url',
        'category',
        'rating',
    ];

    public function gastronomy()
    {
        return $this->belongsTo(Gastronomy::class);
    }
}
