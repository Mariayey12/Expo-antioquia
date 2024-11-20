<?php

namespace Database\Seeders;

use App\Models\TouristPlace;
use Illuminate\Database\Seeder;

class TouristPlaceSeeder extends Seeder
{
    /**
     * Ejecutar los *seeds* de la base de datos.
     */
    public function run(): void
    {
        $lugares_turisticos = [
            // Mejores Lugares Turísticos, Parques, hoteles, centro de relajación, spas, centro de bienestar 
            [
                'name' => 'Parque Arví',
                'description' => 'Reserva natural ideal para caminatas y actividades al aire libre.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.parquearvi.com/images/park.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example1',
                'google_maps' => 'https://www.google.com/maps/place/Parque+Arví',
                'category' => 'turista',
                'latitude' => 6.2176,
                'longitude' => -75.5301,
            ],
            [
                'name' => 'Guatapé',
                'description' => 'Pueblo famoso por su colorido y la Piedra del Peñol.',
                'location' => 'Guatapé',
                'climate' => 'Templado',
                'image_url' => 'https://www.guatape.com.co/images/guatape.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example2',
                'google_maps' => 'https://www.google.com/maps/place/Guatapé',
                'category' => 'turista',
                'latitude' => 6.0035,
                'longitude' => -75.1558,
            ],
            [
                'name' => 'Museo de Antioquia',
                'description' => 'Museo con una rica colección de arte moderno y contemporáneo.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.museodeantioquia.com/images/museum.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example3',
                'google_maps' => 'https://www.google.com/maps/place/Museo+de+Antioquia',
                'category' => 'turista',
                'latitude' => 6.2518,
                'longitude' => -75.5636,
            ],
            [
                'name' => 'Jardín Botánico',
                'description' => 'Espacio verde con una gran variedad de flora y un ambiente tranquilo.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.jardinbotanico.com/images/garden.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example4',
                'google_maps' => 'https://www.google.com/maps/place/Jard%C3%ADn+Bot%C3%A1nico+de+Medell%C3%ADn',
                'category' => 'turista',
                'latitude' => 6.2434,
                'longitude' => -75.5737,
            ],
            [
                'name' => 'Metrocable',
                'description' => 'Transporte público que ofrece vistas panorámicas de la ciudad.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.metrocable.com/images/metrocable.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example5',
                'google_maps' => 'https://www.google.com/maps/place/Metrocable',
                'category' => 'turista',
                'latitude' => 6.2542,
                'longitude' => -75.5905,
            ],
            [
                'name' => 'Pueblo Viejo',
                'description' => 'Un sitio turístico que representa la cultura antioqueña.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.puebloviejo.com/images/pueblo.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example6',
                'google_maps' => 'https://www.google.com/maps/place/Pueblo+Viejo',
                'category' => 'turista',
                'latitude' => 6.2304,
                'longitude' => -75.5910,
            ],
            [
                'name' => 'Plaza Botero',
                'description' => 'Plaza famosa por sus esculturas del artista Fernando Botero.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.plazabotero.com/images/plaza.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example7',
                'google_maps' => 'https://www.google.com/maps/place/Plaza+Botero',
                'category' => 'turista',
                'latitude' => 6.2476,
                'longitude' => -75.5753,
            ],
            [
                'name' => 'Parque de los Deseos',
                'description' => 'Parque popular que ofrece cine al aire libre y eventos culturales.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.parquedeldeseos.com/images/park.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example8',
                'google_maps' => 'https://www.google.com/maps/place/Parque+de+los+Deseos',
                'category' => 'turista',
                'latitude' => 6.2519,
                'longitude' => -75.5698,
            ],
            [
                'name' => 'El Peñol',
                'description' => 'Monumento natural y mirador con impresionantes vistas.',
                'location' => 'Guatapé',
                'climate' => 'Templado',
                'image_url' => 'https://www.elpenol.com/images/rock.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example9',
                'google_maps' => 'https://www.google.com/maps/place/El+Pe%C3%B1ol',
                'category' => 'turista',
                'latitude' => 6.0434,
                'longitude' => -75.1564,
            ],
            [
                'name' => 'Parque Explora',
                'description' => 'Parque interactivo de ciencia y tecnología ideal para familias.',
                'location' => 'Medellín',
                'climate' => 'Templado',
                'image_url' => 'https://www.parqueexplora.com/images/explora.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example10',
                'google_maps' => 'https://www.google.com/maps/place/Parque+Explora',
                'category' => 'turista',
                'latitude' => 6.2462,
                'longitude' => -75.5797,
            ],
        ];

        foreach ($lugares_turisticos as $lugar_turistico) {
            TouristPlace::create($lugar_turistico);
        }
    }
}
