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
             AdminsTableSeeder::class,// Seeder para administradores
             UsersTableSeeder::class,// Seeder para usuarios
             ProvidersTableSeeder::class, // Seeder para proveedores (o servicios, etc.)
             ClientsTableSeeder::class,        // Seeder para clientes

            // Seeders para entidades relacionadas con lugares y servicios
            //CategoriesTableSeeder::class,     // Categorías para lugares
            PlacesTableSeeder::class,         // Seeder para lugares dentro esta categorias servicios comercios
            GastronomysTableSeeder::class,    // Seeder para gastronomía
            //ProductsTableSeeder::class,       // Seeder para productos
            EventsTableSeeder::class,         // Seeder para eventos
            //BlogsTableSeeder::class,          // Seeder para blogs

             // Seeders para tablas pivote o relacionadas
             //FavoritesTableSeeder::class,      // Relación entre usuarios y lugares favoritos
             ReservationsTableSeeder::class,   // Reservas de lugares
             //CommentsTableSeeder::class,       // Comentarios en lugares
             //TestimonialsTableSeeder::class,   // Testimonios de usuarios
             //ReviewCalificationsTableSeeder::class, // Calificaciones y reseñas
             //PromotionsTableSeeder::class,     // Promociones relacionadas con lugares y productos
             //ShoppingCartsTableSeeder::class,  // Carritos de compras
             //MediaGalleryTableSeeder::class,   // Galerías de medios
             //ChatMessagesTableSeeder::class,   // Mensajes de chat
             //AdsTableSeeder::class,            // Anuncios publicitarios
        ]);
    }
}


