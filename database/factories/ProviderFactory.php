<?php

namespace Database\Factories;

use App\Models\Provider;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderFactory extends Factory
{
    protected $model = Provider::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'company_name' => $this->faker->company,
            'contact_person' => $this->faker->name, // Contacto asociado
        ];
    }

    /**
     * Define la relación polimórfica con un servicio.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withService()
    {
        return $this->afterCreating(function (Provider $provider) {
            $service = Service::factory()->create(); // Crea un servicio
            $service->serviceable()->associate($provider); // Asocia el servicio con el proveedor
            $service->save();
        });
    }
}
