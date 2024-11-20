<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //  Mejores Eventos desde festvales feras concertos de musica 
        $events = [
            
        [
            
            'name' => 'Feria de las Flores',
            'description' => 'Evento anual que celebra la cultura antioqueña con desfiles y flores.',
            'location' => 'Medellín',
            'climate' => 'Tropical',
            'image_url' => 'https://www.feriadelasflores.com/images/event1.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example51',
            'google_maps' => 'https://www.google.com/maps/place/Feria+de+las+Flores',
            'latitude' => 6.25184,
            'longitude' => -75.56359,
            'category' => 'event'
        ],
        [
            
            'name' => 'Festival Internacional de Tango',
            'description' => 'Festival que celebra la música y danza del tango.',
            'date' => '2024-06-01',
            'location' => 'Medellín',
            'image_url' => 'https://www.festivaltango.com/images/event2.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example52',
            'google_maps' => 'https://www.google.com/maps/place/Festival+Internacional+de+Tango',
            'latitude' => 6.24722,
            'longitude' => -75.57434,
            'category' => 'event'
        ],
        [
            
            'name' => 'Festival de Cine de Medellín',
            'description' => 'Exhibición de películas nacionales e internacionales.',
            'date' => '2024-10-10',
            'location' => 'Medellín',
            'image_url' => 'https://www.festivaldecinemedellin.com/images/event3.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example53',
            'google_maps' => 'https://www.google.com/maps/place/Festival+de+Cine+de+Medellín',
            'latitude' => 6.26444,
            'longitude' => -75.5675,
            'category' => 'event'
        ],
        [
            
            'name' => 'Feria del Libro',
            'description' => 'Feria anual que celebra la literatura y la cultura.',
            'date' => '2024-09-15',
            'location' => 'Medellín',
            'image_url' => 'https://www.feriadellibro.com/images/event5.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example55',
            'google_maps' => 'https://www.google.com/maps/place/Feria+del+Libro',
            'latitude' => 6.217,
            'longitude' => -75.5702,
            'category' => 'event'
        ],
        [
            
            'name' => 'Festival de Música Clásica',
            'description' => 'Conciertos de música clásica en diferentes escenarios.',
            'date' => '2024-11-20',
            'location' => 'Medellín',
            'image_url' => 'https://www.festivalmusica.com/images/event6.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example56',
            'google_maps' => 'https://www.google.com/maps/place/Festival+de+M%C3%BAsica+Cl%C3%A1sica',
            'latitude' => 6.2459,
            'longitude' => -75.5635,
            'category' => 'event'
        ],
        [
            
            'name' => 'Feria de Antigüedades',
            'description' => 'Exposición y venta de antigüedades y coleccionables.',
            'date' => '2024-05-15',
            'location' => 'Medellín',
            'image_url' => 'https://www.feriadeantiguedades.com/images/event7.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example57',
            'google_maps' => 'https://www.google.com/maps/place/Feria+de+Antig%C3%BCedades',
            'latitude' => 6.253,
            'longitude' => -75.5718,
            'category' => 'event'
        ],
        [
            
            'name' => 'Encuentro de Gastronomía',
            'description' => 'Festival que celebra la cocina colombiana.',
            'date' => '2024-04-25',
            'location' => 'Medellín',
            'image_url' => 'https://www.encuentrogastronomia.com/images/event8.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example58',
            'google_maps' => 'https://www.google.com/maps/place/Encuentro+de+Gastronom%C3%ADa',
            'latitude' => 6.2607,
            'longitude' => -75.5855,
            'category' => 'event'
        ],
        [
            
            'name' => 'Concierto de Música Popular',
            'description' => 'Conciertos de artistas locales y nacionales.',
            'date' => '2024-03-05',
            'location' => 'Medellín',
            'image_url' => 'https://www.conciertomusica.com/images/event9.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example59',
            'google_maps' => 'https://www.google.com/maps/place/Concierto+de+M%C3%BAsica+Popular',
            'latitude' => 6.2751,
            'longitude' => -75.5763,
            'category' => 'event'
        ],
        [
            
            'name' => 'Semana Santa en Medellín',
            'description' => 'Celebraciones y actividades durante la Semana Santa.',
            'date' => '2024-03-28',
            'location' => 'Medellín',
            'image_url' => 'https://www.semanasanta.com/images/event10.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example60',
            'google_maps' => 'https://www.google.com/maps/place/Semana+Santa+en+Medell%C3%ADn',
            'latitude' => 6.2907,
            'longitude' => -75.5746,
            'category' => 'event'
        ],
        [
            
            'name' => 'Festival Internacional de Jazz',
            'description' => 'Celebración de la música jazz con artistas internacionales.',
            'date' => '2024-10-15',
            'location' => 'Medellín',
            'image_url' => 'https://www.festivaljazz.com/images/event2.jpg',
            'google_maps' => 'https://www.google.com/maps/place/Festival+Internacional+de+Jazz',
            'latitude' => 6.2678,
            'longitude' => -75.5731,
            'category' => 'event'
        ],
        [
            
            'name' => 'Concierto de Música Clásica',
            'description' => 'Presentación de una orquesta en el Parque de los Deseos.',
            'date' => '2024-11-20',
            'location' => 'Medellín',
            'image_url' => 'https://www.conciertomusica.com/images/event4.jpg',
            'google_maps' => 'https://www.google.com/maps/place/Concierto+de+M%C3%BAsica+Cl%C3%A1sica',
            'latitude' => 6.2702,
            'longitude' => -75.5709,
            'category' => 'event'
        ],
        [
            'name' => 'Festival de Gastronomía',
            'description' => 'Evento que celebra la comida típica de la región.',
            'date' => '2024-09-10',
            'location' => 'Medellín',
            'image_url' => 'https://www.festivalgastronomia.com/images/event5.jpg',
            'google_maps' => 'https://www.google.com/maps/place/Festival+de+Gastronom%C3%ADa',
            'latitude' => 6.2383,
            'longitude' => -75.5721,
            'category' => 'event'
        ],
        [
        
            'name' => 'Feria del Café',
            'description' => 'Evento que destaca la cultura cafetera de la región.',
            'date' => '2024-06-01',
            'location' => 'Manizales',
            'image_url' => 'https://www.feriadelcafe.com/images/event7.jpg',
            'google_maps' => 'https://www.google.com/maps/place/Feria+del+Caf%C3%A9',
            'latitude' => 5.0703,
            'longitude' => -75.5138,
            'category' => 'event'
        ],];
       foreach ($events as $evento) {
            // Asegurarse de que no haya valores nulos en los campos opcionales
            $evento['climate'] = $evento['climate'] ?? 'N/A';
            $evento['image_url'] = $evento['image_url'] ?? 'https://via.placeholder.com/150';
            $evento['video_url'] = $evento['video_url'] ?? 'https://www.youtube.com/';
            $evento['google_maps'] = $evento['google_maps'] ?? 'https://www.google.com/maps';
            $evento['latitude'] = $evento['latitude'] ?? 0.00000000;
            $evento['longitude'] = $evento['longitude'] ?? 0.00000000;

            Evento::create($evento);
        }
    }
}
