<?php

namespace Database\Seeders;

use App\Models\Handicraf;
use App\Models\Reservation;
use App\Models\TouristPlace;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llama a cada seeder en el orden adecuado.
        // Es recomendable que los seeders que contienen claves foráneas se ejecuten después de sus dependencias.

        $this->call([
            CultureSeeder::class, // Carga de Cultura
            EventSeeder::class, // Carga de Eventos
            UserSeeder::class,        // Carga de usuarios
            ServiceSeeder::class,     // Carga de servicios
            HotelSeeder::class,       // Carga de lugares
            CommentSeeder::class,     // Carga de comentarios
            ReservationSeeder::class, // Carga de Cultura
            TouristPlaceSeeder::class, // Carga de Turismo
            GastronomySeeder::class, // Carga de Gastronomia
            HandicraftSeeder::class, // Carga de Artesania
            ReservationSeeder::class, // Carga de reservas
        ]);
    }
}

