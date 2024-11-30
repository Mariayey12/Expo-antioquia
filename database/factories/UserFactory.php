<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define el estado predeterminado del modelo.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone' => $this->faker->optional()->phoneNumber(),
            'address' => $this->faker->optional()->address(),
            'profile_picture' => $this->faker->optional()->imageUrl(100, 100, 'people', true, 'Perfil'),
            'role' => $this->faker->randomElement(['administrador', 'usuario', 'proveedor']),
            'userable_type' => \App\Models\Admin::class, // Modelo relacionado
            'userable_id' => 1, // ID del modelo relacionado
            'remember_token' => Str::random(10),
        ];

    }

    /**
     * Estado para usuarios no verificados.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

