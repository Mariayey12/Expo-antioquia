<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition()
    {
        return [
            'permissions' => implode(',', $this->faker->randomElements(['manage_users', 'view_reports', 'edit_content'], 2)),
            'department' => $this->faker->randomElement(['IT', 'Marketing', 'Customer Service']),
            'notes' => $this->faker->sentence, // Genera una nota aleatoria
        ];
    }
}
