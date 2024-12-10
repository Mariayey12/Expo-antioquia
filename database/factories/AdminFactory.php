<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition()
    {
        return [
            'permissions' => $this->faker->word,    // Genera un permiso aleatorio
            'department' => $this->faker->word,      // Genera un nombre de departamento aleatorio
            'notes' => $this->faker->sentence,       // Genera una nota aleatoria
        ];
    }
}
