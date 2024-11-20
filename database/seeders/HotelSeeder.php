<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
    class HotelSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */

        // Datos de la base de datos para   Mejores Hoteles
        public function run(): void
        {
            $hotels = [
        
            [
            'name' => 'Hotel Intercontinental Medellín',
            'description' => 'Hotel lujoso con vistas panorámicas de la ciudad.',
            'location' => 'Antoquia', // Asegúrate de incluir esta línea
            'climate' => 'Nublado', // Asegúrate de incluir este campo
            'image_url' => 'https://www.intercontinental.com/images/hotel1.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example',
            'google_maps' => 'https://www.google.com/maps/place/Hotel+Intercontinental',
            'category' => 'hotel',
            'latitude' => 6.25,
            'longitude' => -75.574,
            'services' => json_encode(['piscina', 'gimnasio', 'spa']),
            'price_per_night' => 200,
            'phone_number' => '0345678901',
            'email' => 'info@intercontinental.com',
            'website' => 'https://www.intercontinental.com',
            'capacity' => 150,
            'rating' => 5,
            'address' => 'Calle 1 # 2-3',
            'city' => 'Medellín',
            'created_at' => now(),
            'updated_at' => now()
        ],[
                'name' => 'Hotel Intercontinental Medellín',
                'description' => 'Hotel lujoso con vistas panorámicas de la ciudad.',
                'location' => 'Antoquia',
                'climate' => 'Nublado',
                'image_url' => 'https://www.intercontinental.com/images/hotel1.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example',
                'google_maps' => 'https://www.google.com/maps/place/Hotel+Intercontinental',
                'category' => 'Hotel', // Asegúrate de que esta columna tenga un valor
                'latitude' => 6.25,
                'longitude' => -75.574,
                'services' => json_encode(["piscina", "gimnasio", "spa"]), // Asegúrate de codificarlo si es necesario
                'price_per_night' => 200,
                'phone_number' => '0345678901',
                'email' => 'info@intercontinental.com',
                'website' => 'https://www.intercontinental.com',
                'capacity' => 150,
                'rating' => 5,
                'address' => 'Calle 1 # 2-3',
                'city' => 'Medellín',
                'created_at' => now(),
                'updated_at' => now()
            ],
           
            [

                'name' => 'Hotel Intercontinental Medellín',
                'description' => 'Hotel lujoso con vistas panorámicas de la ciudad.',
                'address' => 'Calle 1 # 2-3',
                'city' => 'Medellín',
                'rating' => 5,
                'price_per_night' => 200.00,
                'phone_number' => '0345678901',
                'email' => 'info@intercontinental.com',
                'website' => 'https://www.intercontinental.com',
                'capacity' => 150,
                'services' => json_encode(['piscina', 'gimnasio', 'spa']),
                'image_url' => 'https://www.intercontinental.com/images/hotel1.jpg',
                'latitude' => 6.2500,
                'longitude' => -75.5740,
                'category' => 'hotel',
            ],
            [

                'name' => 'Hotel Estelar Milla de Oro',
                'description' => 'Hotel moderno ubicado en una de las zonas más exclusivas de Medellín.',
                'address' => 'Carrera 43A # 1-15',
                'city' => 'Medellín',
                'rating' => 4,
                'price_per_night' => 150.00,
                'phone_number' => '0345678902',
                'email' => 'info@estelarmilladeoro.com',
                'website' => 'https://www.estelarmilladeoro.com',
                'capacity' => 120,
                'services' => json_encode(['restaurante', 'salones de eventos']),
                'image_url' => 'https://www.estelarmilladeoro.com/images/hotel2.jpg',
                'latitude' => 6.2501,
                'longitude' => -75.5741,
                'category' => 'hotel',
            ],
            [

                'name' => 'Hotel Dann Carlton Medellín',
                'description' => 'Hotel elegante que ofrece un excelente servicio y comodidad.',
                'address' => 'Calle 2 # 4-10',
                'city' => 'Medellín',
                'rating' => 4,
                'price_per_night' => 180.00,
                'phone_number' => '0345678903',
                'email' => 'info@danncarlton.com',
                'website' => 'https://www.danncarlton.com',
                'capacity' => 100,
                'services' => json_encode(['wifi gratis', 'sala de reuniones']),
                'image_url' => 'https://www.danncarlton.com/images/hotel.jpg',
                'latitude' => 6.2502,
                'longitude' => -75.5742,
                'category' => 'hotel',
            ],
            [

                'name' => 'The Charlee Hotel',
                'description' => 'Hotel boutique con un enfoque en el arte y la cultura.',
                'address' => 'Calle 9 # 4-22',
                'city' => 'Medellín',
                'rating' => 4,
                'price_per_night' => 250.00,
                'phone_number' => '0345678904',
                'email' => 'info@thecharlee.com',
                'website' => 'https://www.thecharlee.com',
                'capacity' => 80,
                'services' => json_encode(['piscina en la azotea', 'bar']),
                'image_url' => 'https://www.thecharlee.com/images/hotel.jpg',
                'latitude' => 6.2503,
                'longitude' => -75.5743,
                'category' => 'hotel',
            ],
            [

                'name' => 'Hotel San Fernando Plaza',
                'description' => 'Hotel moderno con amplias habitaciones y excelentes servicios.',
                'address' => 'Calle 10 # 4-15',
                'city' => 'Medellín',
                'rating' => 4,
                'price_per_night' => 160.00,
                'phone_number' => '0345678905',
                'email' => 'info@sanfernandoplaza.com',
                'website' => 'https://www.sanfernandoplaza.com',
                'capacity' => 140,
                'services' => json_encode(['spa', 'restaurante']),
                'image_url' => 'https://www.sanfernandoplaza.com/images/hotel.jpg',
                'latitude' => 6.2504,
                'longitude' => -75.5744,
                'category' => 'hotel',
            ],
            [

                'name' => 'Hotel Miami',
                'description' => 'Hotel sencillo y cómodo en una buena ubicación.',
                'address' => 'Calle 5 # 4-18',
                'city' => 'Medellín',
                'rating' => 3,
                'price_per_night' => 80.00,
                'phone_number' => '0345678906',
                'email' => 'info@hotelmiami.com',
                'website' => 'https://www.hotelmiami.com',
                'capacity' => 60,
                'services' => json_encode(['wifi gratis']),
                'image_url' => 'https://www.hotelmiami.com/images/hotel.jpg',
                'latitude' => 6.2505,
                'longitude' => -75.5745,
                'category' => 'hotel',
            ],
            [

                'name' => 'Hotel La Playa',
                'description' => 'Un hotel económico ideal para viajeros.',
                'address' => 'Calle 6 # 4-20',
                'city' => 'Medellín',
                'rating' => 3,
                'price_per_night' => 70.00,
                'phone_number' => '0345678907',
                'email' => 'info@hotellaplaya.com',
                'website' => 'https://www.hotellaplaya.com',
                'capacity' => 50,
                'services' => json_encode(['desayuno incluido']),
                'image_url' => 'https://www.hotellaplaya.com/images/hotel.jpg',
                'latitude' => 6.2506,
                'longitude' => -75.5746,
                'category' => 'hotel',
            ],
            [

                'name' => 'Hotel Boutique Casa Rossa',
                'description' => 'Un hotel boutique encantador con un diseño único.',
                'address' => 'Calle 8 # 4-12',
                'city' => 'Medellín',
                'rating' => 4,
                'price_per_night' => 120.00,
                'phone_number' => '0345678908',
                'email' => 'info@casarossa.com',
                'website' => 'https://www.casarossa.com',
                'capacity' => 30,
                'services' => json_encode(['café', 'artículos de tocador gratis']),
                'image_url' => 'https://www.casarossa.com/images/hotel.jpg',
                'latitude' => 6.2507,
                'longitude' => -75.5747,
                'category' => 'hotel',
            ],
            [

                'name' => 'Hotel Casa Blanca',
                'description' => 'Hotel acogedor con un ambiente familiar.',
                'address' => 'Calle 3 # 5-15',
                'city' => 'Medellín',
                'rating' => 4,
                'price_per_night' => 90.00,
                'phone_number' => '0345678909',
                'email' => 'info@hotelcasablanca.com',
                'website' => 'https://www.hotelcasablanca.com',
                'capacity' => 40,
                'services' => json_encode(['salón de eventos', 'wifi gratis']),
                'image_url' => 'https://www.hotelcasablanca.com/images/hotel.jpg',
                'latitude' => 6.2508,
                'longitude' => -75.5748,
                'category' => 'hotel',
            ],
            [

                'name' => 'Hotel Nutibara',
                'description' => 'Hotel histórico en el corazón de Medellín.',
                'address' => 'Carrera 52 # 52-10',
                'city' => 'Medellín',
                'rating' => 3,
                'price_per_night' => 85.00,
                'phone_number' => '0345678910',
                'email' => 'info@hotelnutibara.com',
                'website' => 'https://www.hotelnutibara.com',
                'capacity' => 70,
                'services' => json_encode(['restaurante', 'bar']),
                'image_url' => 'https://www.hotelnutibara.com/images/hotel.jpg',
                'latitude' => 6.2509,
                'longitude' => -75.5749,
                'category' => 'hotel',
            ],
            ];

            foreach ($hotels as $hotel) {
                Hotel::create($hotel);
            }
        }
    }
