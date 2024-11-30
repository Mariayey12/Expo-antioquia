<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provider;
use App\Models\User;

class ProviderTableSeeder extends Seeder
{
    public function run()
    {
        // Crear un proveedor con la fábrica
        $provider = Provider::factory()->create([
            'name' => 'Proveedor Test',
            'email' => 'testprovider@example.com',
            'phone' => '1234567890',
            'address' => '123 Main St',
            'company_name' => 'Proveedor S.A.',
            'contact_person' => null,
            'services' => 'Consultoría, Soporte Técnico',
        ]);

        // Crear un usuario asociado al proveedor
        $user = User::create([
            'name' => 'Proveedor User',
            'email' => 'proveedoruser@example.com',
            'password' => bcrypt('password123'), // Ajusta si no usas contraseñas
        ]);

         // Crear más proveedores con datos aleatorios
         Provider::factory()->count(8)->create();
        }



}
