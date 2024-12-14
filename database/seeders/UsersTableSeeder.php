<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Ejecuta el seeder para la tabla 'users'.
     */
    public function run()
    {
        // Datos de usuarios creados manualmente
        $users = [
            [
                'name' => 'Administrador General',
                'email' => 'admin@example.com',
                'email_verified_at' => Carbon::now(),
                'company_name' => 'Tech Solutions',
                'password' => Hash::make('password123'), // Hashear la contraseña
                'contact_person' => 'Juan Pérez',
                'phone' => '123456789',
                'address' => 'Calle Principal 123, Ciudad',
                'profile_picture' => 'admin_profile.png',
                'role' => 'administrador',
                'userable_type' => 'App\Models\Admin',
                'userable_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Usuario Regular',
                'email' => 'user@example.com',
                'email_verified_at' => Carbon::now(),
                'company_name' => 'Empresa Ejemplo',
                'password' => Hash::make('userpassword'), // Hashear la contraseña
                'contact_person' => 'María López',
                'phone' => '987654321',
                'address' => 'Avenida Secundaria 456, Ciudad',
                'profile_picture' => 'user_profile.png',
                'role' => 'usuario',
                'userable_type' => 'App\Models\Customer',
                'userable_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Proveedor Ejemplo',
                'email' => 'provider@example.com',
                'email_verified_at' => Carbon::now(),
                'company_name' => 'Proveedora XYZ',
                'password' => Hash::make('providerpass'), // Hashear la contraseña
                'contact_person' => 'Carlos Ruiz',
                'phone' => '123987456',
                'address' => 'Carrera 78, Ciudad',
                'profile_picture' => 'provider_profile.png',
                'role' => 'proveedor',
                'userable_type' => 'App\Models\Supplier',
                'userable_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insertar los usuarios manuales
        foreach ($users as $userData) {
            User::create($userData);
        }

        // Generar usuarios adicionales de manera aleatoria con la fábrica
        User::factory()->count(10)->create();
        echo "Usuarios insertados exitosamente.\n";
    }
}
