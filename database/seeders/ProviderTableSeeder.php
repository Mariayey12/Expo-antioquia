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

        ]);

        // Crear un usuario asociado al proveedor
        $user = User::create([
            'name' => 'Proveedor User',
            'email' => 'proveedoruser@example.com',
            'phone' => '12346969',
            'address' => '4545 Maihh St',
            'company_name' => 'Proveedor S.A.',


        ]);
// Crear más administradores con datos aleatorios
Admin::factory()->count(8)->create(); // Puedes ajustar el número según necesites
        // Relacionar el usuario con el proveedor mediante la relación polimórfica
        $user->userable()->associate($provider);
        $user->save();
    }
}
