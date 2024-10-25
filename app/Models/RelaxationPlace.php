<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelaxationPlace extends Model
{
    use HasFactory;

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
        'services',
        'opening_time',
        'closing_time',
        'price_range',
        'contact_number',
        'email',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}

