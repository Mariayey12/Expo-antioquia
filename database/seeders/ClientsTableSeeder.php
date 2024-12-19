<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\User;  // Asegúrate de tener usuarios creados para asociarlos con los clientes

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crear un cliente básico con un usuario asociado
        $user = User::factory()->create(); // Crea un usuario aleatorio utilizando el factory

        Client::create([
            'name' => 'Juan Pérez',
            'email' => 'juan.perez@example.com',
            'user_id' => $user->id,
            'clientable_type' => 'App\Models\Testimonial',  // Puede cambiar a cualquier tipo relacionado
            'clientable_id' => 1,  // ID del modelo relacionado
            'membership_status' => 'basic',
            'phone_number' => '123-456-7890',
            'address' => 'Av. Principal 123',
        ]);

        // Crear un cliente premium
        $user2 = User::factory()->create();

        Client::create([
            'name' => 'Maria González',
            'email' => 'maria.gonzalez@example.com',
            'user_id' => $user2->id,
            'clientable_type' => 'App\Models\Reservation',
            'clientable_id' => 2,  // Cambia el ID a uno válido de otro modelo relacionado
            'membership_status' => 'premium',
            'phone_number' => '987-654-3210',
            'address' => 'Calle Secundaria 456',
        ]);
    }
}
