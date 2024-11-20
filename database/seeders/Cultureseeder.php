<?php

namespace Database\Seeders;

use App\Models\Culture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CultureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */ 
    
    // Datos de la base de datos para los   Mejores Lugares Culturales Museos y teatros 

         
    public function run(): void
    {           
        $culture = [
        [
            
            'name' => 'Museo de Antioquia',
            'description' => 'Museo con una rica colección de arte moderno y contemporáneo.',
            'location' => 'Medellín',
            'image_url' => 'https://www.museodeantioquia.com/images/culture1.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example61',
            'google_maps' => 'https://www.google.com/maps/place/Museo+de+Antioquia',
            'latitude' => 6.2442,
            'longitude' => -75.5736,
            'event_date' => null,
            'category' => 'Cultura',
            'activities' => json_encode(['Visitas guiadas', 'Talleres de arte']),
            'duration_days' => null,
            'artists' => json_encode(['Fernando Botero', 'Débora Arango']),
            'contact_info' => 'Tel: (604) 251 3636',
            'website' => 'https://www.museodeantioquia.com'
        ],
        [
            
            'name' => 'Teatro Metropolitano',
            'description' => 'Espacio cultural para presentaciones de teatro y música.',
            'location' => 'Medellín',
            'image_url' => 'https://www.teatrometropolitano.com/images/culture2.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example62',
            'google_maps' => 'https://www.google.com/maps/place/Teatro+Metropolitano',
            'latitude' => 6.2443,
            'longitude' => -75.5737,
            'event_date' => null,
            'category' => 'Cultura',
            'activities' => json_encode(['Obras de teatro', 'Conciertos']),
            'duration_days' => null,
            'artists' => json_encode(['Grupo de Teatro de Medellín']),
            'contact_info' => 'Tel: (604) 232 1490',
            'website' => 'https://www.teatrometropolitano.com'
        ],
        [
        
            'name' => 'Parque Explora',
            'description' => 'Centro interactivo de ciencia y tecnología.',
            'location' => 'Medellín',
            'image_url' => 'https://www.parqueexplora.com/images/culture3.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example63',
            'google_maps' => 'https://www.google.com/maps/place/Parque+Explora',
            'latitude' => 6.2546,
            'longitude' => -75.5865,
            'event_date' => null,
            'category' => 'Cultura',
            'activities' => json_encode(['Exposiciones interactivas', 'Talleres científicos']),
            'duration_days' => null,
            'artists' => json_encode([]),
            'contact_info' => 'Tel: (604) 444 4343',
            'website' => 'https://www.parqueexplora.com',
        ],
        [
            
            'name' => 'Casa de la Memoria',
            'description' => 'Espacio dedicado a la memoria histórica de Medellín.',
            'location' => 'Medellín',
            'image_url' => 'https://www.casadelamemoria.com/images/culture4.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example64',
            'google_maps' => 'https://www.google.com/maps/place/Casa+de+la+Memoria',
            'latitude' => 6.2527,
            'longitude' => -75.5784,
            'event_date' => null,
            'category' => 'Cultura',
            'activities' => json_encode(['Visitas guiadas', 'Charlas sobre memoria histórica']),
            'duration_days' => null,
            'artists' => json_encode([]),
            'contact_info' => 'Tel: (604) 444 1212',
            'website' => 'https://www.casadelamemoria.com'
        ],
        [
            
            'name' => 'Museo de Arte Moderno',
            'description' => 'Exposición de obras de arte moderno y contemporáneo.',
            'location' => 'Medellín',
            'image_url' => 'https://www.mam.com.co/images/culture5.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example65',
            'google_maps' => 'https://www.google.com/maps/place/Museo+de+Arte+Moderno',
            'latitude' => 6.2440,
            'longitude' => -75.5729,
            'event_date' => null,
            'category' => 'Cultura',
            'activities' => json_encode(['Exposiciones temporales', 'Talleres de arte']),
            'duration_days' => null,
            'artists' => json_encode(['Francisco Antonio Cano']),
            'contact_info' => 'Tel: (604) 444 6044',
            'website' => 'https://www.mam.com.co'
        ],
        [
            
            'name' => 'Pueblito Paisa',
            'description' => 'Recreación de un pueblo tradicional antioqueño.',
            'location' => 'Medellín',
            'image_url' => 'https://www.pueblitopaisa.com/images/culture6.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example66',
            'google_maps' => 'https://www.google.com/maps/place/Pueblito+Paisa',
            'latitude' => 6.2322,
            'longitude' => -75.5702,
            'event_date' => null,
            'category' => 'Cultura',
            'activities' => json_encode(['Recorridos culturales', 'Actividades para niños']),
            'duration_days' => null,
            'artists' => json_encode([]),
            'contact_info' => 'Tel: (604) 232 3801',
            'website' => 'https://www.pueblitopaisa.com'
        ],
        [
            
            'name' => 'El Castillo Museo y Jardines',
            'description' => 'Castillo histórico con hermosos jardines y exposiciones.',
            'location' => 'Medellín',
            'image_url' => 'https://www.elcastillo.com/images/culture7.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example67',
            'google_maps' => 'https://www.google.com/maps/place/El+Castillo+Museo+y+Jardines',
            'latitude' => 6.2373,
            'longitude' => -75.5888,
            'event_date' => null,
            'category' => 'Cultura',
            'activities' => json_encode(['Visitas guiadas', 'Eventos culturales']),
            'duration_days' => null,
            'artists' => json_encode([]),
            'contact_info' => 'Tel: (604) 268 1448',
            'website' => 'https://www.elcastillo.com'
        ],
        [
            
            'name' => 'Museo del Oro',
            'description' => 'Museo que exhibe la historia del oro en Colombia.',
            'location' => 'Medellín',
            'image_url' => 'https://www.museodeloro.com/images/culture8.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example68',
            'google_maps' => 'https://www.google.com/maps/place/Museo+del+Oro',
            'latitude' => 6.2519,
            'longitude' => -75.5705,
            'event_date' => null,
            'category' => 'Cultura',
            'activities' => json_encode(['Exhibiciones de oro', 'Talleres']),
            'duration_days' => null,
            'artists' => json_encode([]),
            'contact_info' => 'Tel: (604) 570 0000',
            'website' => 'https://www.museodeloro.com'
        ],

    [
        
        'name' => 'Centro Cultural Palacio de la Cultura',
        'description' => 'Espacio para exposiciones culturales y artísticas.',
        'location' => 'Medellín',
        'image_url' => 'https://www.centrocultural.com/images/culture9.jpg',
        'video_url' => 'https://www.youtube.com/watch?v=example69',
        'google_maps' => 'https://www.google.com/maps/place/Centro+Cultural+Palacio+de+la+Cultura',
        'latitude' => 6.2442,
        'longitude' => -75.5740,
        'event_date' => null,
        'category' => 'Cultura',
        'activities' => json_encode(['Exposiciones', 'Talleres']),
        'duration_days' => null,
        'artists' => json_encode([]),
        'contact_info' => 'Tel: (604) 280 0000, Email: info@centrocultural.com',
        'website' => 'https://www.centrocultural.com'// Asegúrate de incluir la URL del sitio web
    ],
        [ 
            'name' => 'Festival Internacional de Jazz',
            'description' => 'Un evento anual que celebra la música jazz con artistas nacionales e internacionales.',
            'location' => 'Medellín',
            'image_url' => 'https://www.festivaljazz.com/images/jazz-festival.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example1',
            'google_maps' => 'https://www.google.com/maps/place/Festival+Internacional+de+Jazz',
            'latitude' => 6.2519,
            'longitude' => -75.5703,
            'event_date' => '2024-07-01',
            'category' => 'cultura',
            'activities' => json_encode(['Conciertos', 'Talleres de música']),
            'duration_days' => 3,
            'artists' => json_encode(['Artistas internacionales']),
            'contact_info' => 'Tel: (604) 300 0000',
            'website' => 'https://www.festivaljazz.com'
        ],
        [      
            'name' => 'Feria de las Flores',
            'description' => 'Celebración de la cultura paisa y sus flores en Medellín.',
            'location' => 'Medellín',
            'image_url' => 'https://www.feriadelasflores.com/images/feria.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example2',
            'google_maps' => 'https://www.google.com/maps/place/Feria+de+las+Flores',
            'latitude' => 6.2450,
            'longitude' => -75.5900,
            'event_date' => '2024-08-02',
            'category' => 'Cultura',
            'activities' => json_encode(['Desfile de silleteros', 'Conciertos']),
            'duration_days' => 10,
            'artists' => json_encode(['Artistas locales']),
            'contact_info' => 'Tel: (604) 260 0000',
            'website' => 'https://www.feriadelasflores.com'
        ],
        [
            'name' => 'Fiesta de la Música',
            'description' => 'Un evento donde la música se apodera de las calles de Medellín.',
            'location' => 'Medellín',
            'image_url' => 'https://www.fiestadelamusica.com/images/fiesta.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example3',
            'google_maps' => 'https://www.google.com/maps/place/Fiesta+de+la+Musica',
            'latitude' => 6.2500,
            'longitude' => -75.5705,
            'event_date' => '2024-06-21',
            'category' => 'Cultura',
            'activities' => json_encode(['Conciertos gratuitos', 'Actividades para niños']),
            'duration_days' => 1,
            'artists' => json_encode(['Músicos locales']),
            'contact_info' => 'Tel: (604) 400 0000',
            'website' => 'https://www.fiestadelamusica.com'
        ],
        [
            'name' => 'Cine en las Montañas',
            'description' => 'Proyecciones de cine al aire libre en diferentes localidades de Antioquia.',
            'location' => 'Antioquia',
            'image_url' => 'https://www.cineenlasmontanas.com/images/cine.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example4',
            'google_maps' => 'https://www.google.com/maps/place/Cine+en+las+Montañas',
            'latitude' => 6.2422,
            'longitude' => -75.5865,
            'event_date' => '2024-07-15',
            'category' => 'Cultura',
            'activities' => json_encode(['Proyecciones de películas', 'Charlas con directores']),
            'duration_days' => 5,
            'artists' => json_encode(['Directores de cine locales']),
            'contact_info' => 'Tel: (604) 250 0000',
            'website' => 'https://www.cineenlasmontanas.com'
        ],

        [
            'name' => 'Festival del Libro y la Cultura',
            'description' => 'Un evento literario que reúne a escritores y amantes de los libros.',
            'location' => 'Medellín',
            'image_url' => 'https://www.festivaldelibro.com/images/libro.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example5',
            'google_maps' => 'https://www.google.com/maps/place/Festival+del+Libro+y+la+Cultura',
            'latitude' => 6.2400,
            'longitude' => -75.5700,
            'event_date' => '2024-09-01',
            'category' => 'Cultura',
            'activities' => json_encode(['Firmas de libros', 'Charlas y talleres']),
            'duration_days' => 7,
            'artists' => json_encode(['Escritores colombianos']),
            'contact_info' => 'Tel: (604) 600 0000',
            'website' => 'https://www.festivaldelibro.com'
        ],

        [
            'name' => 'Festival Internacional de Jazz',
            'description' => 'Un evento anual que celebra la música jazz con artistas nacionales e internacionales.',
            'location' => 'Medellín',
            'image_url' => 'https://www.festivaljazz.com/images/jazz-festival.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example1',
            'google_maps' => 'https://www.google.com/maps/place/Festival+Internacional+de+Jazz',
            'latitude' => 6.2519,
            'longitude' => -75.5703,
            'event_date' => '2024-07-01',
            'category' => 'Festival',
            'activities' => json_encode(['Conciertos', 'Talleres de música']),
            'duration_days' => 3,
            'artists' => json_encode(['Artistas internacionales']),
            'contact_info' => 'Tel: (604) 300 0000',
            'website' => 'https://www.festivaljazz.com'
        ],
        [
            'name' => 'Feria de las Flores',
            'description' => 'Celebración de la cultura paisa y sus flores en Medellín.',
            'location' => 'Medellín',
            'image_url' => 'https://www.feriadelasflores.com/images/feria.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example2',
            'google_maps' => 'https://www.google.com/maps/place/Feria+de+las+Flores',
            'latitude' => 6.2450,
            'longitude' => -75.5900,
            'event_date' => '2024-08-02',
            'category' => 'Cultura',
            'activities' => json_encode(['Desfile de silleteros', 'Conciertos']),
            'duration_days' => 10,
            'artists' => json_encode(['Artistas locales']),
            'contact_info' => 'Tel: (604) 260 0000',
            'website' => 'https://www.feriadelasflores.com'
        ],
        [
            'name' => 'Fiesta de la Música',
            'description' => 'Un evento donde la música se apodera de las calles de Medellín.',
            'location' => 'Medellín',
            'image_url' => 'https://www.fiestadelamusica.com/images/fiesta.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example3',
            'google_maps' => 'https://www.google.com/maps/place/Fiesta+de+la+Musica',
            'latitude' => 6.2500,
            'longitude' => -75.5705,
            'event_date' => '2024-06-21',
            'category' => 'Música',
            'activities' => json_encode(['Conciertos gratuitos', 'Actividades para niños']),
            'duration_days' => 1,
            'artists' => json_encode(['Músicos locales']),
            'contact_info' => 'Tel: (604) 400 0000',
            'website' => 'https://www.fiestadelamusica.com'
        ],
        [
            'name' => 'Cine en las Montañas',
            'description' => 'Proyecciones de cine al aire libre en diferentes localidades de Antioquia.',
            'location' => 'Antioquia',
            'image_url' => 'https://www.cineenlasmontanas.com/images/cine.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example4',
            'google_maps' => 'https://www.google.com/maps/place/Cine+en+las+Montañas',
            'latitude' => 6.2422,
            'longitude' => -75.5865,
            'event_date' => '2024-07-15',
            'category' => 'Cine',
            'activities' => json_encode(['Proyecciones de películas', 'Charlas con directores']),
            'duration_days' => 5,
            'artists' => json_encode(['Directores de cine locales']),
            'contact_info' => 'Tel: (604) 250 0000',
            'website' => 'https://www.cineenlasmontanas.com'
        ],
        [
            'name' => 'Festival del Libro y la Cultura',
            'description' => 'Un evento literario que reúne a escritores y amantes de los libros.',
            'location' => 'Medellín',
            'image_url' => 'https://www.festivaldelibro.com/images/libro.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=example5',
            'google_maps' => 'https://www.google.com/maps/place/Festival+del+Libro+y+la+Cultura',
            'latitude' => 6.2400,
            'longitude' => -75.5700,
            'event_date' => '2024-09-01',
            'category' => 'Cultura',
            'activities' => json_encode(['Firmas de libros', 'Charlas y talleres']),
            'duration_days' => 7,
            'artists' => json_encode(['Escritores colombianos']),
            'contact_info' => 'Tel: (604) 600 0000',
            'website' => 'https://www.festivaldelibro.com'
        ],

         ];
    
            foreach ($culture as $cultura) {
                Culture::create($cultura);
            }
    }
}
