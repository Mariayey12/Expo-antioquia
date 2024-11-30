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
            'password' => Hash::make('password'), // Contraseña predeterminada encriptada
            'phone' => $this->faker->optional()->phoneNumber(), // Teléfono opcional
            'address' => $this->faker->optional()->address(), // Dirección opcional
            'profile_picture' => $this->faker->optional()->imageUrl(100, 100, 'people', true, 'Perfil'), // Imagen opcional
            'role' => $this->faker->randomElement(['administrador', 'usuario', 'proveedor']), // Roles predefinidos
            'userable_type' => null, // Inicialmente null, se define al asignar el modelo polimórfico
            'userable_id' => null, // Inicialmente null, se define al asignar el modelo polimórfico
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

