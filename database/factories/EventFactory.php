<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'start_date' => $this->faker->dateTimeBetween('+1 days', '+1 month'),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'location' => $this->faker->address(),
            'cost' => $this->faker->randomFloat(2, 0, 100), // Puede ser 0 para eventos gratuitos
            'organizer_name' => $this->faker->company(),
            'contact_info' => $this->faker->email(),
            'image_url' => $this->faker->imageUrl(800, 600, 'events'),
            'video_url' => $this->faker->url(),
            'google_maps' => $this->faker->url(),
            'is_active' => $this->faker->boolean(),
            'average_rating' => $this->faker->randomFloat(1, 3, 5),
            'reviews_count' => $this->faker->numberBetween(0, 500),
        ];
    }
}
