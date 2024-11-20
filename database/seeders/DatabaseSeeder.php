<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llama a cada seeder en el orden adecuado para evitar problemas de dependencias de claves foráneas.
        
        $this->call([
            UserSeeder::class,            // Cargar Usuarios
            ServiceSeeder::class,         // Cargar Servicios (para Comentarios y Reservas)
            ComerceSeeder::class,         // Cargar Comercios
            CultureSeeder::class,         // Cargar Cultura
            EventSeeder::class,           // Cargar Eventos
            GastronomySeeder::class,      // Cargar Gastronomía
            HandicraftSeeder::class,      // Cargar Artesanía
            HotelSeeder::class,           // Cargar Hoteles
            TouristPlaceSeeder::class,    // Cargar Lugares Turísticos
            RestaurantSeeder::class,      // Cargar Restaurantes
            RelationPlaceSeeder::class,   // Cargar Lugares de Relajación
            ReservationSeeder::class,     // Cargar Reservas (después de Usuarios y Servicios)
            CommentSeeder::class,         // Cargar Comentarios (después de Usuarios y Servicios)
        ]);
    }
}
