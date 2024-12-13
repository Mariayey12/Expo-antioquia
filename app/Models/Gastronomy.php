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

    // Relationship with Place
    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Polymorphic relationship with Event
    public function events()
    {
        return $this->morphToMany(Event::class, 'eventable');
    }

    // Relationship with Promotions
    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }
}

