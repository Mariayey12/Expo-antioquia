<?php

namespace Database\Seeders;

use App\Models\Comerce;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

    class ComerceSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
    

            $comerces = [  
                [   
                'name' => 'Centro Comercial El Tesoro',
                'description' => 'Centro comercial con diversas tiendas y entretenimiento.',
                'location' => 'Medellín',
                'climate' => 'Tropical',
                'image_url' => 'https://www.eltesorocomercial.com/images/mall1.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example41',
                'google_maps' => 'https://www.google.com/maps/place/Centro+Comercial+El+Tesoro',
                'category' => 'commerce',
                'contact_number' => '(604) 123 4567',
                'email' => 'info@eltesorocomercial.com',
                'website' => 'https://www.eltesorocomercial.com',
                'categories' => json_encode(['centro comercial', 'entretenimiento']),
            ],
            [
                
                'name' => 'La 70',
                'description' => 'Zona de comercio y entretenimiento con una variedad de tiendas y restaurantes.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.la70.com/images/comercio.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example42',
                'google_maps' => 'https://www.google.com/maps/place/La+70',
                'category' => 'commerce',
                'contact_number' => '(604) 234 5678',
                'email' => 'info@la70.com',
                'website' => 'https://www.la70.com',
                'categories' => json_encode(['zona comercial', 'entretenimiento']),
            ],
            [
                
                'name' => 'Centro Comercial Santafé',
                'description' => 'Uno de los centros comerciales más grandes de Medellín con múltiples opciones de compras.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.santafe.com.co/images/comercio.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example43',
                'google_maps' => 'https://www.google.com/maps/place/Centro+Comercial+Santafé',
                'category' => 'commerce',
                'contact_number' => '(604) 345 6789',
                'email' => 'info@santafe.com.co',
                'website' => 'https://www.santafe.com.co',
                'categories' => json_encode(['centro comercial', 'compras']),
            ],
            [
            
                'name' => 'Plaza Mayor',
                'description' => 'Centro de exposiciones y convenciones con tiendas y servicios.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.plazamayor.com.co/images/comercio.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example44',
                'google_maps' => 'https://www.google.com/maps/place/Plaza+Mayor',
                'category' => 'commerce',
                'contact_number' => '(604) 456 7890',
                'email' => 'info@plazamayor.com.co',
                'website' => 'https://www.plazamayor.com.co',
                'categories' => json_encode(['exposiciones', 'servicios']),
            ],
            [
                
                'name' => 'Mercado del Rio',
                'description' => 'Un espacio gastronómico con opciones de comida local e internacional.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.mercadodelrio.com.co/images/comercio.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example45',
                'google_maps' => 'https://www.google.com/maps/place/Mercado+del+Rio',
                'category' => 'commerce',
                'contact_number' => '(604) 567 8901',
                'email' => 'info@mercadodelrio.com.co',
                'website' => 'https://www.mercadodelrio.com.co',
                'categories' => json_encode(['gastronomía', 'comida']),
            ],
            [
                
                'name' => 'La Playa Centro Comercial',
                'description' => 'Centro comercial que ofrece una variedad de tiendas y servicios.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.laplaya.com.co/images/comercio.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example46',
                'google_maps' => 'https://www.google.com/maps/place/La+Playa+Centro+Comercial',
                'category' => 'commerce',
                'contact_number' => '(604) 678 9012',
                'email' => 'info@laplaya.com.co',
                'website' => 'https://www.laplaya.com.co',
                'categories' => json_encode(['centro comercial', 'compras']),
            ],
            [
                
                'name' => 'El Tesoro Parque Comercial',
                'description' => 'Centro comercial con vista panorámica y tiendas exclusivas.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.eltesoroparque.com.co/images/comercio.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example47',
                'google_maps' => 'https://www.google.com/maps/place/El+Tesoro+Parque+Comercial',
                'category' => 'commerce',
                'contact_number' => '(604) 789 0123',
                'email' => 'info@eltesoroparque.com.co',
                'website' => 'https://www.eltesoroparque.com.co',
                'categories' => json_encode(['centro comercial', 'tiendas exclusivas']),
            ],
            [
                
                'name' => 'Centro Comercial Oviedo',
                'description' => 'Espacio comercial con una variedad de opciones de entretenimiento y compras.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.oviedo.com.co/images/comercio.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example48',
                'google_maps' => 'https://www.google.com/maps/place/Centro+Comercial+Oviedo',
                'category' => 'commerce',
                'contact_number' => '(604) 890 1234',
                'email' => 'info@oviedo.com.co',
                'website' => 'https://www.oviedo.com.co',
                'categories' => json_encode(['centro comercial', 'entretenimiento']),
            ],
            [
                
                'name' => 'La 33',
                'description' => 'Área de comercio local con tiendas de ropa, comida y más.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.la33.com/images/comercio.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example49',
                'google_maps' => 'https://www.google.com/maps/place/La+33',
                'category' => 'commerce',
                'contact_number' => '(604) 901 2345',
                'email' => 'info@la33.com',
                'website' => 'https://www.la33.com',
                'categories' => json_encode(['comercio local', 'tiendas']),
            ],
            [
                
                'name' => 'Centro Comercial Premium Plaza',
                'description' => 'Centro comercial moderno con opciones de entretenimiento y compras.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.premiumplaza.com.co/images/comercio.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example50',
                'google_maps' => 'https://www.google.com/maps/place/Centro+Comercial+Premium+Plaza',
                'category' => 'commerce',
                'contact_number' => '(604) 012 3456',
                'email' => 'info@premiumplaza.com.co',
                'website' => 'https://www.premiumplaza.com.co',
                'categories' => json_encode(['centro comercial', 'entretenimiento']),
            ],
            [
                
                'name' => 'Mall Plaza',
                'description' => 'Centro comercial con una gran variedad de tiendas y actividades familiares.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.mallplaza.com.co/images/comercio.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example51',
                'google_maps' => 'https://www.google.com/maps/place/Mall+Plaza',
                'category' => 'commerce',
                'contact_number' => '(604) 123 4567',
                'email' => 'info@mallplaza.com.co',
                'website' => 'https://www.mallplaza.com.co',
                'categories' => json_encode(['centro comercial', 'actividades familiares'])
            ],
        ];

            foreach ($comerces as $comerce) {
                Comerce::create($comerce);
            }
                

        }
}

