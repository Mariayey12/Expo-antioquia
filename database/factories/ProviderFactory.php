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
            'description' => $this->faker->paragraph, // Descripción
            'profile_picture' => $this->faker->imageUrl, // Imagen de perfil o logo
            'website' => $this->faker->url, // Sitio web
            'company_name' => $this->faker->company, // Nombre de la compañía
            'contact_person' => $this->faker->name, // Persona de contacto
            'userable_id' => $this->faker->randomNumber(),
            'userable_type' => 'App\Models\User', // Puedes cambiarlo según el tipo de usuario
        ];
    }

    /**
     * Método para asociar un servicio aleatorio al proveedor.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withService()
    {
        return $this->afterCreating(function (Provider $provider) {
            // Crear un servicio
            $service = Service::factory()->create();

            // Asociar el servicio al proveedor utilizando la relación polimórfica
            $service->serviceable()->associate($provider);
            $service->save();
        });
    }

    /**
     * Método para asociar múltiples servicios aleatorios al proveedor.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withMultipleServices($count = 3)
    {
        return $this->afterCreating(function (Provider $provider) use ($count) {
            // Crear varios servicios aleatorios
            $services = Service::factory()->count($count)->create();

            // Asociar los servicios al proveedor
            foreach ($services as $service) {
                $service->serviceable()->associate($provider);
                $service->save();
            }
        });
    }
}
