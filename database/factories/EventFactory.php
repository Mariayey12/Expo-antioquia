<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(4),
            'type' => $this->faker->randomElement(['festival', 'concierto', 'feria', 'taller']),
            'start_date' => $this->faker->dateTimeBetween('+1 days', '+2 months'),
            'end_date' => $this->faker->dateTimeBetween('+2 months', '+3 months'),
            'location' => $this->faker->address,
            'cost' => $this->faker->optional()->randomFloat(2, 0, 100),
            'organizer_name' => $this->faker->company,
            'contact_info' => $this->faker->email,
            'image_url' => $this->faker->imageUrl(640, 480, 'events', true, 'Event'),
            'video_url' => $this->faker->optional()->url,
            'google_maps' => $this->faker->optional()->url,
            'is_active' => $this->faker->boolean(80), // 80% de probabilidad de estar activo
            'average_rating' => $this->faker->randomFloat(1, 0, 5),
            'reviews_count' => $this->faker->numberBetween(0, 100),
        ];
    }
}


