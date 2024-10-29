<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = [
         //Mejores Restaurants 
        [
            
            'name' => 'El Cielo Medellín',
            'description' => 'Restaurante de alta cocina con un enfoque en la experiencia sensorial.',
            'location' => 'Medellín',
            'climate' => 'Templado',
            'image_url' => 'https://www.elcielorestaurant.com/images/restaurant.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example11',
            'google_maps' => 'https://www.google.com/maps/place/Restaurante+El+Cielo',
            'latitude' => 6.2300,
            'longitude' => -75.5900,
            'phone_number' => '1234567890',
            'email' => 'info@elcielo.com',
            'website' => 'https://www.elcielorestaurant.com',
            'average_price' => 80.00,
            'menu' => json_encode(['plato1' => 'Filete Mignon', 'plato2' => 'Sopa de Trufa']),
            'services' => json_encode(['Delivery', 'Reservas']),
            'category' => 'restaurant',
            'rating' => 4.5,
        ],
        [
            
            'name' => 'Hacienda Junín',
            'description' => 'Restaurante tradicional que ofrece platos típicos antioqueños.',
            'location' => 'Medellín',
            'climate' => 'Templado',
            'image_url' => 'https://www.hacienda-junin.com/images/restaurant.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example12',
            'google_maps' => 'https://www.google.com/maps/place/Hacienda+Junín',
            'latitude' => 6.2500,
            'longitude' => -75.5700,
            'phone_number' => '0987654321',
            'email' => 'info@haciendajunin.com',
            'website' => 'https://www.haciendajunin.com',
            'average_price' => 50.00,
            'menu' => json_encode(['plato1' => 'Bandeja Paisa', 'plato2' => 'Sancocho']),
            'services' => json_encode(['Delivery', 'Reservas']),
            'category' => 'restaurant',
            'rating' => 4.0,
        ],
        [
            
            'name' => 'Restaurante La Pampa',
            'description' => 'Carnes a la parrilla en un ambiente acogedor.',
            'location' => 'Medellín',
            'climate' => 'Tropical',
            'image_url' => 'https://www.lapampa.com/images/restaurant2.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example13',
            'google_maps' => 'https://www.google.com/maps/place/Restaurante+La+Pampa',
            'latitude' => 6.2544,
            'longitude' => -75.5731,
            'phone_number' => '1122334455',
            'email' => 'info@lapampa.com',
            'website' => 'https://www.lapampa.com',
            'average_price' => 60.00,
            'menu' => json_encode(['plato1' => 'Asado de Tira', 'plato2' => 'Chorizo']),
            'services' => json_encode(['Delivery', 'Reservas']),
            'category' => 'restaurant',
            'rating' => 4.2,
        ],
        [
            
            'name' => 'Oci.Mde',
            'description' => 'Restaurante moderno que combina gastronomía local con un toque contemporáneo.',
            'location' => 'Medellín',
            'climate' => 'Templado',
            'image_url' => 'https://www.ocimde.com/images/restaurant.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example14',
            'google_maps' => 'https://www.google.com/maps/place/Oci.Mde',
            'latitude' => 6.2450,
            'longitude' => -75.5900,
            'phone_number' => '2233445566',
            'email' => 'info@ocimde.com',
            'website' => 'https://www.ocimde.com',
            'average_price' => 70.00,
            'menu' => json_encode(['plato1' => 'Risotto', 'plato2' => 'Tacos de Pescado']),
            'services' => json_encode(['Reservas']),
            'category' => 'restaurant',
            'rating' => 4.6,
        ],
        [
            
            'name' => 'Café Zorba',
            'description' => 'Café-restaurant famoso por sus pizzas y ambiente bohemio.',
            'location' => 'Medellín',
            'climate' => 'Templado',
            'image_url' => 'https://www.cafezorba.com/images/restaurant.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example15',
            'google_maps' => 'https://www.google.com/maps/place/Café+Zorba',
            'latitude' => 6.2505,
            'longitude' => -75.5750,
            'phone_number' => '3344556677',
            'email' => 'info@cafezorba.com',
            'website' => 'https://www.cafezorba.com',
            'average_price' => 25.00,
            'menu' => json_encode(['plato1' => 'Pizza Margarita', 'plato2' => 'Ensalada Zorba']),
            'services' => json_encode(['Wi-Fi', 'Delivery']),
            'category' => 'café',
            'rating' => 4.3,
        ],
        [
            
            'name' => 'La Pampa Parrilla Argentina',
            'description' => 'Parrilla argentina conocida por sus carnes a la brasa.',
            'location' => 'Medellín',
            'climate' => 'Templado',
            'image_url' => 'https://www.lapampa.com.co/images/restaurant.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example16',
            'google_maps' => 'https://www.google.com/maps/place/La+Pampa+Parrilla+Argentina',
            'latitude' => 6.2480,
            'longitude' => -75.5780,
            'phone_number' => '4455667788',
            'email' => 'info@lapampaparrilla.com',
            'website' => 'https://www.lapampa.com.co',
            'average_price' => 70.00,
            'menu' => json_encode(['plato1' => 'Bife de Chorizo', 'plato2' => 'Provoleta']),
            'services' => json_encode(['Delivery', 'Reservas']),
            'category' => 'restaurant',
            'rating' => 4.4,
        ],
        [
            
            'name' => 'Carmen',
            'description' => 'Restaurante galardonado que combina la cocina colombiana con técnicas modernas.',
            'location' => 'Medellín',
            'climate' => 'Templado',
            'image_url' => 'https://www.carmenmedellin.com/images/restaurant.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example17',
            'google_maps' => 'https://www.google.com/maps/place/Carmen',
            'latitude' => 6.2400,
            'longitude' => -75.5905,
            'phone_number' => '5566778899',
            'email' => 'info@carmenmedellin.com',
            'website' => 'https://www.carmenmedellin.com',
            'average_price' => 90.00,
            'menu' => json_encode(['plato1' => 'Ceviche', 'plato2' => 'Filete de Pescado']),
            'services' => json_encode(['Reservas']),
            'category' => 'restaurant',
            'rating' => 4.8,
        ],
        [
            
            'name' => 'El Herbario',
            'description' => 'Restaurante que ofrece una experiencia gastronómica saludable y orgánica.',
            'location' => 'Medellín',
            'climate' => 'Templado',
            'image_url' => 'https://www.elherbario.com/images/restaurant.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example18',
            'google_maps' => 'https://www.google.com/maps/place/El+Herbario',
            'latitude' => 6.2535,
            'longitude' => -75.5800,
            'phone_number' => '6677889900',
            'email' => 'info@elherbario.com',
            'website' => 'https://www.elherbario.com',
            'average_price' => 40.00,
            'menu' => json_encode(['plato1' => 'Ensalada de Quinoa', 'plato2' => 'Tazón de Frutas']),
            'services' => json_encode(['Delivery']),
            'category' => 'restaurant',
            'rating' => 4.7,
        ],
    ];

        foreach ($restaurants as $restaurant) {
            Restaurant::create($restaurant);
        }
    }
}
