<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Admin;  // Asegúrate de importar el modelo relacionado
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
        // Obtener el primer admin para usarlo en la relación polimórfica
        $admin = Admin::first() ?? Admin::factory()->create(); // Crea uno si no existe

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone' => $this->faker->optional()->phoneNumber(),
            'address' => $this->faker->optional()->address(),
            'profile_picture' => $this->faker->optional()->imageUrl(100, 100, 'people', true, 'Perfil'),
            'role' => $this->faker->randomElement(['administrador', 'usuario', 'proveedor']),
            'userable_type' => Admin::class, // Usar el nombre de la clase del modelo relacionado
            'userable_id' => $admin->id, // Establecer el ID del modelo relacionado
           

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

