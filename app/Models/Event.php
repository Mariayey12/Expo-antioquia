<?php

// App\Models\Event.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'start_date',
        'end_date',
        'location',
        'cost',
        'organizer_name',
        'contact_info',
        'image_url',
        'video_url',
        'google_maps',
        'is_active',
        'average_rating',
        'reviews_count',
    ];

    // Relación polimórfica
    public function eventable()
    {
        return $this->morphTo();
    }
    // Relación polimórfica con gastronomía
    public function gastronomy()
    {
        return $this->morphedByMany(Gastronomia::class, 'eventable');
    }

    // Relación con reseñas
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}

