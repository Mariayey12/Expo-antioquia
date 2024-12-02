<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceFactory extends Factory
{
    protected $model = \App\Models\Place::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->address,
            'image_url' => $this->faker->imageUrl(640, 480, 'places'),
            'video_url' => $this->faker->url,
            'google_maps' => $this->faker->url,
            'average_price' => $this->faker->randomFloat(2, 10, 100),
            'opening_time' => $this->faker->time('H:i:s'),
            'closing_time' => $this->faker->time('H:i:s'),
            'price_range' => $this->faker->randomElement(['$', '$$', '$$$']),
            'contact_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'price_per_night' => $this->faker->numberBetween(50, 500),
            'phone_number' => $this->faker->phoneNumber,
            'rating' => $this->faker->randomFloat(2, 1, 5),
            'website' => $this->faker->url,
            'capacity' => $this->faker->numberBetween(10, 500),
            'menu' => $this->faker->randomElements(['Pizza', 'Burger', 'Sushi'], 3),
            'date' => $this->faker->date(),
            'event_date' => $this->faker->date(),
            'activities' => $this->faker->randomElements(['Hiking', 'Swimming', 'Dancing'], 2),
            'duration_days' => $this->faker->numberBetween(1, 10),
            'artists' => $this->faker->name,
            'artist' => $this->faker->name,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'provider_name' => $this->faker->company,
            'contact_info' => $this->faker->email,
            'material' => $this->faker->word,
            'technique' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 10, 500),
            'cost' => $this->faker->randomFloat(2, 5, 200),
            'services' => $this->faker->word,
            'duration' => $this->faker->randomElement(['1 hour', '2 hours', 'Half day']),
            'is_active' => $this->faker->boolean,
            'opening_days' => json_encode($this->faker->randomElements(['Monday', 'Tuesday', 'Wednesday', 'Thursday'], 3)),
            'is_featured' => $this->faker->boolean,
            'has_parking' => $this->faker->boolean,
            'is_renovated' => $this->faker->boolean,
            'last_renovation_date' => $this->faker->date(),
            'price_range_category' => $this->faker->randomElement(['Budget', 'Standard', 'Luxury']),
            'reviews_count' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
