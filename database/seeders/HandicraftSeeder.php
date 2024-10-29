<?php

namespace Database\Seeders;

use App\Models\Handicraf;
use App\Models\Handicraft;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HandicraftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //// Mejores Artesanías talleres y lugares 
        $handicrafts = [
    
        [
            
            'name' => 'Artesanías de Guatapé',
            'description' => 'Artesanías coloridas y únicas hechas a mano en Guatapé.',
            'location' => 'Guatapé',
            'image_url' => 'https://www.artesaniasguatape.com/images/crafts1.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example71',
            'google_maps' => 'https://www.google.com/maps/place/Artesanías+de+Guatapé',
            'material' => 'Madera, Barro',
            'technique' => 'Técnica de alfarería',
            'price' => 25.00,
            'categories' => json_encode(['decoración', 'útiles']),
            'artist' => 'Artisan Name 1',
            'contact_info' => 'Tel: (604) 123 4567, Email: info@artesaniasguatape.com',
        ],
        [
            
            'name' => 'Sombreros Vueltiaos',
            'description' => 'Sombreros tradicionales de la región de Sucre, elaborados a mano.',
            'location' => 'Sucre',
            'image_url' => 'https://www.example.com/images/sombrero1.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example72',
            'google_maps' => 'https://www.google.com/maps/place/Sombreros+Vueltiaos',
            'material' => 'Paja',
            'technique' => 'Tejido manual',
            'price' => 40.00,
            'categories' => json_encode(['moda', 'tradicional']),
            'artist' => 'Artisan Name 2',
            'contact_info' => 'Tel: (604) 234 5678, Email: info@sombreros.com',
        ],
        [
            
            'name' => 'Cerámica de Ráquira',
            'description' => 'Cerámicas coloridas y utilitarias de la región de Ráquira.',
            'location' => 'Ráquira',
            'image_url' => 'https://www.example.com/images/ceramica1.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example73',
            'google_maps' => 'https://www.google.com/maps/place/Cerámica+de+Ráquira',
            'material' => 'Barro',
            'technique' => 'Alfarería',
            'price' => 35.00,
            'categories' => json_encode(['decoración', 'útiles']),
            'artist' => 'Artisan Name 3',
            'contact_info' => 'Tel: (604) 345 6789, Email: info@ceramicarquira.com',
        ],
        [
            
            'name' => 'Mochilas Wayuu',
            'description' => 'Mochilas tejidas a mano por la comunidad Wayuu.',
            'location' => 'La Guajira',
            'image_url' => 'https://www.example.com/images/mochila1.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example74',
            'google_maps' => 'https://www.google.com/maps/place/Mochilas+Wayuu',
            'material' => 'Hilo',
            'technique' => 'Tejido a mano',
            'price' => 50.00,
            'categories' => json_encode(['moda', 'artesanal']),
            'artist' => 'Artisan Name 4',
            'contact_info' => 'Tel: (604) 456 7890, Email: info@mochilaswayuu.com',
        ],
        [
            
            'name' => 'Cojines de Café',
            'description' => 'Cojines artesanales hechos con sacos de café reciclados.',
            'location' => 'Eje Cafetero',
            'image_url' => 'https://www.example.com/images/cojin1.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example75',
            'google_maps' => 'https://www.google.com/maps/place/Cojines+de+Café',
            'material' => 'Tela reciclada',
            'technique' => 'Costura',
            'price' => 30.00,
            'categories' => json_encode(['decoración', 'reciclaje']),
            'artist' => 'Artisan Name 5',
            'contact_info' => 'Tel: (604) 567 8901, Email: info@cojinesdecafe.com',
        ],
        [
            
            'name' => 'Muebles de Palets',
            'description' => 'Muebles rústicos y ecológicos elaborados con palets reciclados.',
            'location' => 'Bogotá',
            'image_url' => 'https://www.example.com/images/mueble1.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example76',
            'google_maps' => 'https://www.google.com/maps/place/Muebles+de+Palets',
            'material' => 'Madera reciclada',
            'technique' => 'Construcción manual',
            'price' => 150.00,
            'categories' => json_encode(['muebles', 'reciclaje']),
            'artist' => 'Artisan Name 6',
            'contact_info' => 'Tel: (604) 678 9012, Email: info@mueblesdepalets.com',
        ],
        [
            
            'name' => 'Bolsos de Tela',
            'description' => 'Bolsos ecológicos hechos de tela reciclada y técnicas de bordado.',
            'location' => 'Cali',
            'image_url' => 'https://www.example.com/images/bolso1.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example77',
            'google_maps' => 'https://www.google.com/maps/place/Bolsos+de+Tela',
            'material' => 'Tela reciclada',
            'technique' => 'Bordado',
            'price' => 20.00,
            'categories' => json_encode(['moda', 'reciclaje']),
            'artist' => 'Artisan Name 7',
            'contact_info' => 'Tel: (604) 789 0123, Email: info@bolsostela.com',
        ],
        [
            
            'name' => 'Joyas de Arcilla',
            'description' => 'Joyas únicas y artesanales hechas de arcilla polimérica.',
            'location' => 'Medellín',
            'image_url' => 'https://www.example.com/images/joya1.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example78',
            'google_maps' => 'https://www.google.com/maps/place/Joyas+de+Arcilla',
            'material' => 'Arcilla polimérica',
            'technique' => 'Modelado a mano',
            'price' => 15.00,
            'categories' => json_encode(['joyería', 'artesanal']),
            'artist' => 'Artisan Name 8',
            'contact_info' => 'Tel: (604) 890 1234, Email: info@joyasdearcilla.com',
        ],
        [
            
            'name' => 'Cestas de Mimbre',
            'description' => 'Cestas tejidas a mano con técnica tradicional de mimbre.',
            'location' => 'Santander',
            'image_url' => 'https://www.example.com/images/cesta1.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example79',
            'google_maps' => 'https://www.google.com/maps/place/Cestas+de+Mimbre',
            'material' => 'Mimbre',
            'technique' => 'Tejido a mano',
            'price' => 45.00,
            'categories' => json_encode(['decoración', 'útiles']),
            'artist' => 'Artisan Name 9',
            'contact_info' => 'Tel: (604) 901 2345, Email: info@cestasdemimbre.com',
        ],
        [
            
            'name' => 'Figuras de Guatapé',
            'description' => 'Figuras artesanales pintadas a mano representando la cultura de Guatapé.',
            'location' => 'Guatapé',
            'image_url' => 'https://www.example.com/images/figura1.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example80',
            'google_maps' => 'https://www.google.com/maps/place/Figuras+de+Guatapé',
            'material' => 'Madera',
            'technique' => 'Pintura a mano',
            'price' => 30.00,
            'categories' => json_encode(['decoración', 'arte']),
            'artist' => 'Artisan Name 10',
            'contact_info' => 'Tel: (604) 012 3456, Email: info@figurasdeguatape.com',
        ],

        ];

        foreach ($handicrafts as $artesania) {
            Handicraft::create($artesania);
        }
    }
}
