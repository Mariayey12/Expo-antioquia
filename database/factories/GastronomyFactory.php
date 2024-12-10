<?php

// database/factories/GastronomiaFactory.php

namespace Database\Factories;

use App\Models\Gastronomy;
use Illuminate\Database\Eloquent\Factories\Factory;

class GastronomyFactory extends Factory
{
    protected $model = Gastronomy::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->text,
            'type' => $this->faker->randomElement(['Restaurante', 'Cafetería', 'Bar']),
            'location' => $this->faker->address,
            'image_url' => $this->faker->imageUrl,
            'user_id' => \App\Models\User::factory(), // Asumiendo que tienes un modelo User
        ];
    }
}
