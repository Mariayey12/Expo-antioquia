<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provider;
use App\Models\User;
use App\Models\Service;

class ProviderTableSeeder extends Seeder
{
    public function run()
    {
        // Crear un proveedor con datos específicos
        $provider = Provider::create([
            'name' => 'Proveedor Test',
            'email' => 'testprovider@example.com',
            'phone' => '1234567890',
            'address' => '123 Main St',
            'company_name' => 'Proveedor S.A.',
            'contact_person' => 'Juan Pérez', // Cambiado a un nombre significativo
        ]);

        // Crear un usuario asociado al proveedor (relación polimórfica)
        $user = User::create([
            'name' => 'Proveedor User',
            'email' => 'proveedoruser@example.com',
            'password' => bcrypt('password123'),
            'userable_type' => Provider::class, // Usar el nombre de la clase como string
            'userable_id' => $provider->id, // Usar el ID del proveedor creado
        ]);

        // Crear servicios asociados al proveedor (relación polimórfica)
        $service1 = Service::create([
            'name' => 'Consultoría',
            'description' => 'Servicios de consultoría en tecnologías.',
        ]);

        $service2 = Service::create([
            'name' => 'Soporte Técnico',
            'description' => 'Soporte técnico para equipos informáticos.',
        ]);

        // Asociar los servicios al proveedor usando la relación polimórfica
        $provider->services()->saveMany([$service1, $service2]);

        // Crear más proveedores con datos aleatorios y asociar servicios
        Provider::factory()
            ->count(8)
            ->create()
            ->each(function ($provider) {
                // Crear servicios aleatorios para cada proveedor
                $services = Service::factory()->count(2)->create();
                $provider->services()->saveMany($services);
            });
    }
}
