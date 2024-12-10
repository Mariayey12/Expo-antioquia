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
            'contact_person' => '65565657656',
            'services' => 'Consultoría, Soporte Técnico',
        ]);

        // Crear un usuario asociado al proveedor
        $user = User::create([
            'name' => 'Proveedor User',
            'email' => 'proveedoruser@example.com',
            'password' => bcrypt('password123'),
            'userable_type' =>'App\Models\Provider'::class, // Especificar la relación polimórfica
            'userable_id' => 2,    // ID del proveedor asociado
        ]);

        // Crear más proveedores con datos aleatorios
        Provider::factory()->count(8)->create();
    }
}
