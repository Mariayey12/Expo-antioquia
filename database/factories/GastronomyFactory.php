<?php

namespace Database\Factories;

use App\Models\Gastronomy;
use Illuminate\Database\Eloquent\Factories\Factory;

class GastronomyFactory extends Factory
{
    protected $model = Gastronomy::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'contact_info' => json_encode([
                'phone' => $this->faker->phoneNumber,
                'email' => $this->faker->safeEmail,
            ]),
            'opening_hours' => 'Mon-Sun: 9 AM - 10 PM',
            'cost_range' => $this->faker->randomElement(['low', 'medium', 'high']),
            'image_url' => $this->faker->imageUrl(640, 480, 'food', true),
            'video_url' => $this->faker->url,
            'google_maps' => $this->faker->url,
            'specialties' => $this->faker->words(3, true),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'is_open' => $this->faker->boolean,
            'average_rating' => $this->faker->randomFloat(2, 0, 5),
            'reviews_count' => $this->faker->numberBetween(0, 1000),
        ];
    }
}

