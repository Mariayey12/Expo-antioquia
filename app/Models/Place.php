<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    // Columnas que se pueden llenar masivamente
    protected $fillable = [
        'name',
        'description',
        'location',
        'image_url',
        'video_url',
        'google_maps',
        'average_price',
        'opening_time',
        'closing_time',
        'price_range',
        'contact_number',
        'email',
        'address',
        'city',
        'price_per_night',
        'phone_number',
        'rating',
        'website',
        'capacity',
        'menu',
        'date',
        'event_date',
        'activities',
        'duration_days',
        'artists',
        'artist',
        'latitude',
        'longitude',
        'provider_name',
        'contact_info',
        'material',
        'technique',
        'price',
        'cost',
        'services',
        'duration',
        'is_active',
        'opening_days',
        'is_featured',
        'has_parking',
        'is_renovated',
        'last_renovation_date',
        'price_range_category',
        'reviews_count',
    ];

    // Casts para columnas específicas
    protected $casts = [
        'menu' => 'array',
        'activities' => 'array',
        'opening_days' => 'array',
        'latitude' => 'float',
        'longitude' => 'float',
        'average_price' => 'decimal:2',
        'price' => 'decimal:2',
        'cost' => 'float',
        'rating' => 'float',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'has_parking' => 'boolean',
        'is_renovated' => 'boolean',
    ];

    // Relación polimórfica con categorías.
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }



    // Relación polimórfica con servicios.
    public function services()
    {
        return $this->morphToMany(Service::class, 'serviceable');
    }


    /**
     * Relación polimórfica inversa para comercios.
     */
   // Relación polimórfica muchos a muchos inversa

   public function commerces()
   {
       return $this->morphedByMany(Commerce::class, 'placeable');
   }

    // Relación polimórfica con reseñas.
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    // Relación uno a muchos con reservas.
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    // Relación uno a muchos con comentarios.
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
 
// En el modelo Place
public function events()
{
    return $this->morphMany(Event::class, 'eventable');
}
// En el modelo Place
public function gastronomies()
{
    return $this->morphMany(Gastronomy::class, 'gastronomiceable');
}

}
