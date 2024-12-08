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



    /**
     * Relación polimórfica para categorías.
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    /**
     * Relación polimórfica para lugares (Place).
     */
    public function places()
    {
        return $this->morphToMany(Place::class, 'placeable');
    }

    /**
     * Relación polimórfica con otro modelo, si es necesario.
     */
    public function commerceable()
    {
        return $this->morphTo();
    }
}
