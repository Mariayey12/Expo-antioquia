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
        'category',
        'contact_number',
        'email',
        'website',
        'categories',
    ];

    protected $casts = [
        'categories' => 'array', // Convierte el campo JSON a un arreglo
    ];

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }


    public function places()
    {
        return $this->morphToMany(Place::class, 'placeable');
    }
    /**
     * Relación polimórfica.
     */
    public function commerceable()
    {
        return $this->morphTo();
    }
}
