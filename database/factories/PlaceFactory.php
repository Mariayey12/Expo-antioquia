<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceFactory extends Factory
{
    protected $model = \App\Models\Place::class;

    public function definition()
    {
        // Simular modelos relacionados
        $categorizableTypes = [
            \App\Models\Category::class, // Cambia esto según tus modelos reales
            \App\Models\Event::class,
        ];

        $placeableTypes = [
            \App\Models\Hotel::class, // Cambia esto según tus modelos reales
            \App\Models\Restaurant::class,
        ];

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
            'menu' => json_encode($this->faker->randomElements(['Pizza', 'Burger', 'Sushi'], 3)),
            'date' => $this->faker->date(),
            'event_date' => $this->faker->date(),
            'activities' => json_encode($this->faker->randomElements(['Hiking', 'Swimming', 'Dancing'], 2)),
            'duration_days' => $this->faker->numberBetween(1, 10),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'price' => $this->faker->randomFloat(2, 10, 500),
            'is_active' => $this->faker->boolean,
            'opening_days' => json_encode($this->faker->randomElements(['Monday', 'Tuesday', 'Wednesday'], 2)),
            'categorizable_type' => $this->faker->randomElement($categorizableTypes),
            'categorizable_id' => $this->faker->numberBetween(1, 10), // Debe corresponder a un ID válido
            'placeable_type' => $this->faker->randomElement($placeableTypes),
            'placeable_id' => $this->faker->numberBetween(1, 10), // Debe corresponder a un ID válido
        ];
    }
}
