<?php
// app/Models/Place.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
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

    // Relación polimórfica inversa
   // Relación polimórfica: Place con Services
   public function services()
   {
       return $this->morphToMany(Service::class, 'serviceable');
   }

   // Relación polimórfica: Place con Categories
   public function categories()
   {
       return $this->morphToMany(Category::class, 'categorizable');
   }

   // Relación polimórfica: Place con Commerces
   public function commerces()
   {
       return $this->morphToMany(Commerce::class, 'placeable');
   }

}

