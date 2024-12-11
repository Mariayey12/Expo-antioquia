<?php

namespace Database\Factories;

use App\Models\Provider;
use App\Models\Service; // Asegúrate de importar el modelo de Service
use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderFactory extends Factory
{
    protected $model = Provider::class;

    public function definition()
    {
        // Crear un servicio de forma aleatoria
        $service = Service::factory()->create();

        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'company_name' => $this->faker->company,
            // Relación polimórfica
            'serviceable_type' => Service::class, // Indica que es un servicio
            'serviceable_id' => $service->id, // Asocia el proveedor con un servicio aleatorio
        ];
    }
}
