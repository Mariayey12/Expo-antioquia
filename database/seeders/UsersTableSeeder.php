<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\Provider;
use App\Models\Customer; // Asumimos que tienes un modelo Customer
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Crear administradores, proveedores y clientes
        $admin = Admin::factory()->create(); // Crea un admin
        $provider = Provider::factory()->create(); // Crea un proveedor
        //$customer = Customer::factory()->create(); // Crea un cliente

        // Crear usuarios con relaciones polimórficas
        $users = [
            [
                'name' => 'Juan Pérez',
                'email' => 'juan@example.com',
                'password' => Hash::make('password123'),
                'phone' => '3001234567',
                'address' => 'Calle 123 #45-67, Medellín',
                'email_verified_at' => Carbon::now(),
                'role' => 'administrador',
                'remember_token' => Str::random(10),
                'userable_type' => App\Models\Admin, // Relación con Admin
                'userable_id' => 1,    // ID del Admin creado
            ],
            [
                'name' => 'Carlos García',
                'email' => 'carlos@example.com',
                'password' => Hash::make('password1235'),
                'phone' => '3209876543',
                'address' => 'Avenida 1 #23-45, Cali',
                'email_verified_at' => Carbon::now(),
                'role' => 'proveedor',
                'remember_token' => Str::random(10),
                'userable_type' => App\Models\Provider, // Relación con Provider
                'userable_id' => $provider->id,     // ID del Provider creado
            ],
            [
                'name' => 'Ana Torres',
                'email' => 'ana@example.com',
                'password' => Hash::make('password123976'),
                'phone' => '3051237890',
                'address' => 'Diagonal 12 #34-56, Cartagena',
                'email_verified_at' => Carbon::now(),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'userable_type' => App\Models\User, // Relación con Customer
                'userable_id' => 3,   // ID del Customer creado
            ],
            [
                'name' => 'Laura Gómez',
                'email' => 'laura@example.com',
                'password' => Hash::make('password54321'),
                'phone' => '3009876543',
                'address' => 'Calle 45 #56-78, Bogotá',
                'email_verified_at' => Carbon::now(),
                'role' => 'administrador',
                'remember_token' => Str::random(10),
                'userable_type' => App\Models\Admin, // Relación con Admin
                'userable_id' => 4,    // ID del Admin creado
            ],
        ];

        // Insertar usuarios en la base de datos
        foreach ($users as $userData) {
            try {
                $user = User::create($userData);

                // Asociar relación polimórfica solo si es válida
                if (!empty($userData['userable_type']) && !empty($userData['userable_id'])) {
                    $relatedModel = $userData['userable_type']::find($userData['userable_id']);

                    if ($relatedModel) {
                        $user->userable()->associate($relatedModel);
                        $user->save();
                    }
                }
            } catch (\Exception $e) {
                Log::error("Error al crear el usuario: {$e->getMessage()}", $userData);
            }
        }

        echo "Usuarios insertados exitosamente.\n";
    }
}
