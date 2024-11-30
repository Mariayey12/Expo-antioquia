<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provider;
use Carbon\Carbon;

class ProvidersTableSeeder extends Seeder
{
    public function run()
    {
        // Crear proveedores con datos ficticios usando factory
        Provider::factory()->create([
            'name' => 'Proveedor 1',
            'email' => 'proveedor1@example.com',
            'phone' => '1234567890',
            'address' => 'Calle Falsa 123, Ciudad 1',
            'company_name' => 'Compañía A',
            'services' => 'Transporte, Logística',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Provider::factory()->create([
            'name' => 'Proveedor 2',
            'email' => 'proveedor2@example.com',
            'phone' => '0987654321',
            'address' => 'Calle Real 456, Ciudad 2',
            'company_name' => 'Compañía B',
            'services' => 'Catering, Eventos',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Crear múltiples proveedores con un loop o más factories
        Provider::factory(5)->create();
    }
}
