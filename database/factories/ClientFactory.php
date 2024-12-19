<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use App\Models\Testimonial; // Asumiendo que 'Testimonial' es uno de los modelos que se pueden relacionar
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * El nombre del modelo que corresponde al factory.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Definir el estado predeterminado de la fábrica.
     *
     * @return array
     */
    public function definition()
    {
        // Usamos Testimonial como ejemplo de modelo relacionado
        $clientable = Testimonial::inRandomOrder()->first(); // Esto obtiene un Testimonial aleatorio para la relación

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'user_id' => User::inRandomOrder()->first()->id, // Asociar a un usuario aleatorio
            'membership_status' => $this->faker->randomElement(['basic', 'premium']),
            'phone_number' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),

            // Relación polimórfica
            'clientable_id' => $clientable->id, // ID del modelo relacionado
            'clientable_type' => get_class($clientable), // Tipo del modelo relacionado (nombre completo de la clase)
        ];
    }
}

