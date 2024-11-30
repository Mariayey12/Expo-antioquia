<?php

namespace Database\Seeders;

use App\Models\Gastronomy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GastronomySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Datos de las gastronomías lugares platos tpcos restaurantes cafe 
       

        $gastronomy= [ 
    
        [
    
            'name' => 'Bandeja Paisa',
            'description' => 'Plato típico de Antioquia con frijoles, carne, plátano y más.',
            'location' => 'Antioquia',
            'image_url' => 'https://www.gastronomiapaisa.com/images/gastronomy1.jpg',
            'google_maps' => 'https://www.google.com/maps/place/Bandeja+Paisa',
            'category' => 'gastronomy',
            'latitude' => 6.2442, // Latitud real
            'longitude' => -75.5812, // Longitud real
            'video_url' => 'https://www.youtube.com/watch?v=example1' // URL de video
        ],
        [
            
            'name' => 'Arepas',
            'description' => 'Deliciosas arepas de maíz, acompañadas de varios ingredientes.',
            'location' => 'Antioquia',
            'image_url' => 'https://www.gastronomiapaisa.com/images/gastronomy2.jpg',
            'google_maps' => 'https://www.google.com/maps/place/Arepas',
            'category' => 'gastronomy',
            'latitude' => 6.2442,
            'longitude' => -75.5812,
            'video_url' => 'https://www.youtube.com/watch?v=example2'
        ],
        [
            
            'name' => 'Sancocho',
            'description' => 'Sopa tradicional a base de yuca, plátano y carne.',
            'location' => 'Antioquia',
            'image_url' => 'https://www.gastronomiapaisa.com/images/gastronomy3.jpg',
            'google_maps' => 'https://www.google.com/maps/place/Sancocho',
            'category' => 'gastronomy',
            'latitude' => 6.2442,
            'longitude' => -75.5812,
            'video_url' => 'https://www.youtube.com/watch?v=example3'
        ],
        [
            
            'name' => 'Tamales',
            'description' => 'Plato hecho con masa de maíz y relleno de carne y vegetales.',
            'location' => 'Antioquia',
            'image_url' => 'https://www.gastronomiapaisa.com/images/gastronomy4.jpg',
            'google_maps' => 'https://www.google.com/maps/place/Tamales',
            'category' => 'gastronomy',
            'latitude' => 6.2442,
            'longitude' => -75.5812,
            'video_url' => 'https://www.youtube.com/watch?v=example4'
        ],
        [
            
            'name' => 'Buñuelos',
            'description' => 'Bollos fritos de masa de queso, perfectos para acompañar.',
            'location' => 'Antioquia',
            'image_url' => 'https://www.gastronomiapaisa.com/images/gastronomy5.jpg',
            'google_maps' => 'https://www.google.com/maps/place/Bu%C3%B1uelos',
            'category' => 'gastronomy',
            'latitude' => 6.2442,
            'longitude' => -75.5812,
            'video_url' => 'https://www.youtube.com/watch?v=example5'
        ],
        [
            
            'name' => 'Empanadas',
            'description' => 'Deliciosas empanadas rellenas de carne o pollo.',
            'location' => 'Antioquia',
            'image_url' => 'https://www.gastronomiapaisa.com/images/gastronomy6.jpg',
            'google_maps' => 'https://www.google.com/maps/place/Empanadas',
            'category' => 'gastronomy',
            'latitude' => 6.2442,
            'longitude' => -75.5812,
            'video_url' => 'https://www.youtube.com/watch?v=example6'
        ],
        [
            
            'name' => 'Posta Negra',
            'description' => 'Carne de res en salsa de panela, un deleite para el paladar.',
            'location' => 'Antioquia',
            'image_url' => 'https://www.gastronomiapaisa.com/images/gastronomy7.jpg',
            'google_maps' => 'https://www.google.com/maps/place/Posta+Negra',
            'category' => 'gastronomy',
            'latitude' => 6.2442,
            'longitude' => -75.5812,
            'video_url' => 'https://www.youtube.com/watch?v=example7'
        ],
        [
            
            'name' => 'Ajiaco',
            'description' => 'Sopa tradicional con pollo, maíz y papas.',
            'location' => 'Antioquia',
            'image_url' => 'https://www.gastronomiapaisa.com/images/gastronomy8.jpg',
            'google_maps' => 'https://www.google.com/maps/place/Ajiaco',
            'category' => 'gastronomy',
            'latitude' => 6.2442,
            'longitude' => -75.5812,
            'video_url' => 'https://www.youtube.com/watch?v=example8'
        ],
        [
            
            'name' => 'Chocoramo',
            'description' => 'Delicia de galleta con chocolate y relleno de marshmallow.',
            'location' => 'Antioquia',
            'image_url' => 'https://www.gastronomiapaisa.com/images/gastronomy9.jpg',
            'google_maps' => 'https://www.google.com/maps/place/Chocoramo',
            'category' => 'gastronomy',
            'latitude' => 6.2442,
            'longitude' => -75.5812,
            'video_url' => 'https://www.youtube.com/watch?v=example9'
        ],
        [
            
            'name' => 'Tinto',
            'description' => 'Café negro, una tradición antioqueña.',
            'location' => 'Antioquia',
            'image_url' => 'https://www.gastronomiapaisa.com/images/gastronomy10.jpg',
            'google_maps' => 'https://www.google.com/maps/place/Tinto',
            'category' => 'gastronomy',
            'latitude' => 6.2442,
            'longitude' => -75.5812,
            'video_url' => 'https://www.youtube.com/watch?v=example10'
        ],

        ];

        foreach ($gastronomy as $gastronomia) {
            Gastronomy::create($gastronomia);
        }
    }
}
