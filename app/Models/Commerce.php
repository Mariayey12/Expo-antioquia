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

/**
     * Relación con categorías (tabla pivote).
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
}

