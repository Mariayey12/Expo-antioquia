<?php

// database/factories/EventFactory.php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->text,
            'location' => $this->faker->address,
            'start_date' => $this->faker->dateTimeThisYear,
            'end_date' => $this->faker->dateTimeThisYear,
            'image_url' => $this->faker->imageUrl,
        ];
    }
}