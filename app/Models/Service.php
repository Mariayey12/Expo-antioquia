<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cost',
        'duration',
        'image_url',
        'video_url',
        'google_maps',
        'provider_name',
        'location',
        'is_available',
        'available_from',
        'available_until',
        'contact_info',
        'status',
        'reviews_count',
        'average_rating',
    ];

    protected $casts = [
        'cost' => 'decimal:2',
        'is_available' => 'boolean',
        'available_from' => 'datetime',
        'available_until' => 'datetime',
        'average_rating' => 'float',
        'reviews_count' => 'integer',
    ];

    /**
     * Relación polimórfica.
     */
    public function serviceable()
    {
        return $this->morphTo();
    }


    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
    public function commerces()
    {
        return $this->morphedByMany(Commerce::class, 'serviceable');
    }
    // Relación polimórfica inversa
    public function providers()
    {
        return $this->morphMany(Provider::class, 'serviceable');
    }


}


