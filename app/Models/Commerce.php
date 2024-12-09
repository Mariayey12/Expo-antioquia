<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Commerce extends Model
    {
        use HasFactory;

        protected $fillable = [
            'name',
            'description',
            'location',
            'image_url',
            'video_url',
            'google_maps',
            'contact_number',
            'email',
            'website',

        ];

    // Relación polimórfica muchos a muchos
    public function commerceables()
    {
        return $this->morphedByMany(Place::class, 'commerceable');
    }
// Relación polimórfica muchos a muchos inversa


public function commerces()
{
    return $this->morphedByMany(Commerce::class, 'categorizable');
}
    /**
         * Relación con categorías (tabla pivote).
         */
        // Relación polimórfica con las categorías
        public function categories()
        {
            return $this->morphToMany(Category::class, 'categorizable');
        }

        // Relación polimórfica con los lugares
        public function places()
        {
            return $this->morphToMany(Place::class, 'placeable');
        }

        // Relación polimórfica con los servicios
        public function services()
        {
            return $this->morphToMany(Service::class, 'serviceable');
        }

    }

