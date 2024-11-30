<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        // Crear administradores de forma dinámica
        $admin = Admin::factory()->create(); // Crear un administrador con la fábrica

        // Crear un usuario y asociarlo con el administrador (relación polimórfica)
        $user = User::create([
            'name' => 'Administrador de prueba',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'phone' => '3001234567',
            'address' => 'Calle 123 #45-67, Medellín',
            'email_verified_at' => Carbon::now(),
            'profile_picture' => null,
            'role' => 'administrador',
            'remember_token' => Str::random(10),
            'userable_type' => 'App\Models\Admin', // Relación polimórfica con Admin
            'userable_id' => $admin->id, // ID dinámico del Admin
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Crear más administradores con la fábrica si es necesario
        Admin::factory()->count(8)->create(); // Crear más administradores aleatorios si lo deseas

        echo "Administrador insertado exitosamente.\n";
    }
}
