<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Llama a los seeders de las tablas específicas en el orden adecuado
        $this->call([
            // Seeders para usuarios y roles
            AdminsTableSeeder::class,          // Administradores
            UsersTableSeeder::class,           // Usuarios
            ProvidersTableSeeder::class,       // Proveedores
            ClientsTableSeeder::class,         // Clientes

            // Seeders para entidades principales
            //CategoriesTableSeeder::class,      // Categorías para lugares y servicios
            PlacesTableSeeder::class,          // Lugares (depende de categorías)
            GastronomysTableSeeder::class,     // Gastronomía
            EventsTableSeeder::class,          // Eventos
            ProductsTableSeeder::class,        // Productos
            BlogsTableSeeder::class,           // Blogs
            AdsTableSeeder::class,             // Anuncios publicitarios

            // Seeders para datos relacionados o tablas pivote
            ReservationsTableSeeder::class,    // Reservas de lugares
            CommentsTableSeeder::class,        // Comentarios
            TestimonialsTableSeeder::class,    // Testimonios
            FavoritesTableSeeder::class,       // Favoritos (usuarios y lugares)
            ReviewCalificationsTableSeeder::class, // Calificaciones y reseñas
            ShoppingCartsTableSeeder::class,   // Carritos de compras

            // Seeders adicionales
            PromotionsTableSeeder::class,      // Promociones
            MediaGallerysTableSeeder::class,   // Galerías de medios
            ChatMessagesTableSeeder::class,    // Mensajes de chat

            // Seeders recientemente creados
            CultureSeeder::class,              // Culturas
            CraftSeeder::class,                // Artesanías
            SportSeeder::class,                // Deportes
            NewsSeeder::class,                 // Actualidad
            DepartmentSeeder::class,           // Departamentos
            MunicipalitySeeder::class,         // Municipios
        ]);
    }
}


