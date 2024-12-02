<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = \App\Models\Service::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'cost' => $this->faker->randomFloat(2, 10, 500),
            'duration' => $this->faker->randomElement(['30 minutes', '1 hour', '2 hours']),
            'image_url' => $this->faker->imageUrl(640, 480, 'services'),
            'video_url' => $this->faker->url,
            'google_maps' => $this->faker->url,
            'provider_name' => $this->faker->company,
            'location' => $this->faker->address,
            'is_available' => $this->faker->boolean,
            'available_from' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'available_until' => $this->faker->dateTimeBetween('+1 month', '+6 months'),
            'contact_info' => $this->faker->phoneNumber,
            'status' => $this->faker->randomElement(['active', 'inactive', 'maintenance']),
            'reviews_count' => $this->faker->numberBetween(0, 100),
            'average_rating' => $this->faker->randomFloat(1, 0, 5),
        ];
    }
}
