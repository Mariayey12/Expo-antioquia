<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\Provider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Crear administradores y proveedores con factory
        $admin = Admin::factory()->create();
        $provider = Provider::factory()->create();

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
                'userable_type' =>  'App\Models\Admin', // Usamos el tipo de relación correcto
                'userable_id' => 1,    // Usamos el ID del Admin
            ],
            [
                'name' => 'Carlos García',
                'email' => 'carlos@example.com',
                'password' => Hash::make('password123'),
                'phone' => '3209876543',
                'address' => 'Avenida 1 #23-45, Cali',
                'email_verified_at' => Carbon::now(),
                'role' => 'proveedor',
                'remember_token' => Str::random(10),
                'userable_type' =>   'App\Models\Provider', // Usamos el tipo de relación correcto
                'userable_id' => 2,    // Usamos el ID del Provider
            ],
            [
                'name' => 'Ana Torres',
                'email' => 'ana@example.com',
                'password' => Hash::make('password123'),
                'phone' => '3051237890',
                'address' => 'Diagonal 12 #34-56, Cartagena',
                'email_verified_at' => Carbon::now(),
                'role' => 'usuario',
                'remember_token' => Str::random(10),
                'userable_type' =>   'App\Models\User',  // No tiene un modelo relacionado
                'userable_id' => 3,    // No tiene ID
            ],
        ];

        // Crear los usuarios
        foreach ($users as $userData) {
            $user = User::create($userData);
            foreach ($users as $userData) {
                // Verificar que los datos requeridos no sean nulos
                if (!empty($userData['userable_type']) && !empty($userData['userable_id'])) {
                    // Crear el usuario
                    $user = User::create($userData);

                    // Validar que el modelo polimórfico exista antes de asociarlo
                    $relatedModel = $userData['userable_type']::find($userData['userable_id']);
                    if ($relatedModel) {
                        $user->userable()->associate($relatedModel);
                        $user->save();
                    } else {
                        // Manejar el caso donde el modelo relacionado no exista
                        Log::warning("El modelo relacionado no se encontró: {$userData['userable_type']} con ID {$userData['userable_id']}");
                    }
                } else {
                    // Manejar el caso donde los datos sean nulos o incompletos
                    Log::error("Los datos de userable_type o userable_id son nulos o inválidos", $userData);
                }
            }


        }

        echo "Usuarios insertados exitosamente.\n";
    }
}

