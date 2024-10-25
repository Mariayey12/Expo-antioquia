<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    use HasFactory;

    protected $table = 'cultura';

    protected $fillable = [
        'name',
        'description',
        'location',
        'image_url',
        'video_url',
        'google_maps',
        'latitude',
        'longitude',
        'event_date',
        'category',
        'activities',
        'duration_days',
        'artists',
        'contact_info',
        'website',
    ];

    // Relaciones
    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
}
