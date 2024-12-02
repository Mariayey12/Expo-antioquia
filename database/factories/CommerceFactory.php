<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommerceFactory extends Factory
{
    protected $model = \App\Models\Commerce::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->address,
            'image_url' => $this->faker->imageUrl(640, 480, 'commerce'),
            'video_url' => $this->faker->url,
            'google_maps' => $this->faker->url,
            'category' => $this->faker->randomElement(['Retail', 'Restaurant', 'Service', 'Entertainment']),
            'contact_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'website' => $this->faker->url,
            'categories' => $this->faker->randomElements(['Electronics', 'Fashion', 'Groceries', 'Books'], 2), // Ejemplo de categorías
        ];
    }
}
