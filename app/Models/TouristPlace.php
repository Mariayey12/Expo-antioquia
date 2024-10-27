<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristPlace extends Model
{
    use HasFactory;
 protected $table = 'tourist_places';

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
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
