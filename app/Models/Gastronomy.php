<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gastronomy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'city',
        'contact_info',
        'opening_hours',
        'cost_range',
        'image_url',
        'video_url',
        'google_maps',
        'specialties',
        'latitude',
        'longitude',
        'is_open',
        'average_rating',
        'reviews_count',
    ];

    // Relación polimórfica
    public function gastronomiceable()
    {
        return $this->morphTo();
    }
    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function places()
{
    return $this->morphToMany(Place::class, 'placeable');
}


public function categories()
{
    return $this->morphToMany(Category::class, 'categorizable');
}

    // Polymorphic relationship with Event
    public function events()
    {
        return $this->morphToMany(Event::class, 'eventable');
    }

    public function promotions()
    {
        return $this->morphToMany(Promotion::class, 'promocionable');
    }
    // Relación polimórfica de gastronomía
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}

