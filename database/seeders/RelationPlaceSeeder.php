<?php

namespace Database\Seeders;

use App\Models\RelaxationPlace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

    class RelationPlaceSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            $relaxation_places = [

        //Mejores Lugares de Relajacon       
            [
                
                'name' => 'Parque Arví',
                'description' => 'Reserva natural ideal para caminatas y picnic.',
                'location' => 'Medellín',
                'image_url' => 'https://www.parquearvi.com/images/relaxation1.jpg',
                'google_maps' => 'https://www.google.com/maps/place/Parque+Arv%C3%AD',
                'category' => 'relaxation',
                'climate' => 'Tropical',
                'latitude' => 6.1828,
                'longitude' => -75.4858,
                'services' => json_encode(['caminatas', 'picnic']),
                'opening_time' => '08:00:00',
                'closing_time' => '17:00:00',
                'price_range' => 0.00,
                'contact_number' => '0123456789',
                'email' => 'info@parquearvi.com',
            ],
            [
                
                'name' => 'Jardín Botánico',
                'description' => 'Hermosos jardines y senderos para relajarse.',
                'location' => 'Medellín',
                'image_url' => 'https://www.jardinbotanico.com/images/relaxation2.jpg',
                'google_maps' => 'https://www.google.com/maps/place/Jard%C3%ADn+Bot%C3%A1nico',
                'category' => 'relaxation',
                'climate' => 'Tropical',
                'latitude' => 6.2482,
                'longitude' => -75.5726,
                'services' => json_encode(['senderos', 'jardines']),
                'opening_time' => '09:00:00',
                'closing_time' => '18:00:00',
                'price_range' => 0.00,
                'contact_number' => '0987654321',
                'email' => 'info@jardinbotanico.com',
            ],
            [
                
                'name' => 'Parque de los Deseos',
                'description' => 'Espacio cultural y recreativo en la ciudad.',
                'location' => 'Medellín',
                'image_url' => 'https://www.parquededeseos.com/images/relaxation3.jpg',
                'google_maps' => 'https://www.google.com/maps/place/Parque+de+los+Deseos',
                'category' => 'relaxation',
                'climate' => 'Tropical',
                'latitude' => 6.2515,
                'longitude' => -75.5764,
                'services' => json_encode(['cultural events', 'recreación']),
                'opening_time' => '10:00:00',
                'closing_time' => '21:00:00',
                'price_range' => 0.00,
                'contact_number' => '0345678901',
                'email' => 'info@parquededeseos.com',
            ],
            [
                
                'name' => 'Cerro Nutibara',
                'description' => 'Mirador con vistas panorámicas de la ciudad.',
                'location' => 'Medellín',
                'image_url' => 'https://www.cerrounitibara.com/images/relaxation4.jpg',
                'google_maps' => 'https://www.google.com/maps/place/Cerro+Nutibara',
                'category' => 'relaxation',
                'climate' => 'Tropical',
                'latitude' => 6.2612,
                'longitude' => -75.5758,
                'services' => json_encode(['mirador', 'senderos']),
                'opening_time' => '06:00:00',
                'closing_time' => '19:00:00',
                'price_range' => 0.00,
                'contact_number' => '0345678902',
                'email' => 'info@cerrounitibara.com',
            ],
            [
                
                'name' => 'Parque El Poblado',
                'description' => 'Un espacio verde en medio de la ciudad.',
                'location' => 'Medellín',
                'image_url' => 'https://www.parqueelpoblado.com/images/relaxation5.jpg',
                'google_maps' => 'https://www.google.com/maps/place/Parque+El+Poblado',
                'category' => 'relaxation',
                'climate' => 'Tropical',
                'latitude' => 6.2116,
                'longitude' => -75.5706,
                'services' => json_encode(['senderos', 'áreas de descanso']),
                'opening_time' => '06:00:00',
                'closing_time' => '22:00:00',
                'price_range' => 0.00,
                'contact_number' => '0345678903',
                'email' => 'info@parqueelpoblado.com',
            ],
            [
                
                'name' => 'Reserva Natural Cañón del Río Claro',
                'description' => 'Espacio natural para el ecoturismo y la relajación.',
                'location' => 'Cañón del Río Claro',
                'image_url' => 'https://www.canyonrio.com/images/relaxation6.jpg',
                'google_maps' => 'https://www.google.com/maps/place/Reserva+Natural+C%C3%A1non+del+R%C3%ADo+Claro',
                'category' => 'relaxation',
                'climate' => 'Tropical',
                'latitude' => 6.1750,
                'longitude' => -75.6130,
                'services' => json_encode(['ecoturismo', 'senderos']),
                'opening_time' => '08:00:00',
                'closing_time' => '17:00:00',
                'price_range' => 10.00,
                'contact_number' => '0345678904',
                'email' => 'info@canyondelrioclaro.com',
            ],
            [
            
                'name' => 'Laguna de Guatapé',
                'description' => 'Un hermoso lago ideal para la recreación y el descanso.',
                'location' => 'Guatapé',
                'image_url' => 'https://www.lagunaguatape.com/images/relaxation7.jpg',
                'google_maps' => 'https://www.google.com/maps/place/Laguna+de+Guatap%C3%A9',
                'category' => 'relaxation',
                'climate' => 'Tropical',
                'latitude' => 6.0422,
                'longitude' => -75.1665,
                'services' => json_encode(['navegación', 'paseos']),
                'opening_time' => '08:00:00',
                'closing_time' => '18:00:00',
                'price_range' => 15.00,
                'contact_number' => '0345678905',
                'email' => 'info@lagunaguatape.com',
            ],
            [
                
                'name' => 'Cascada La Honda',
                'description' => 'Un lugar tranquilo rodeado de naturaleza.',
                'location' => 'San Carlos',
                'image_url' => 'https://www.cascadalahonda.com/images/relaxation8.jpg',
                'google_maps' => 'https://www.google.com/maps/place/Cascada+La+Honda',
                'category' => 'relaxation',
                'climate' => 'Tropical',
                'latitude' => 5.7576,
                'longitude' => -75.6348,
                'services' => json_encode(['senderos', 'picnic']),
                'opening_time' => '08:00:00',
                'closing_time' => '17:00:00',
                'price_range' => 0.00,
                'contact_number' => '0345678906',
                'email' => 'info@cascadalahonda.com',
            ],
            [
                
                'name' => 'Termales de Santa Rosa',
                'description' => 'Aguas termales perfectas para relajarse.',
                'location' => 'Santa Rosa de Cabal',
                'image_url' => 'https://www.termalessantarosa.com/images/relaxation9.jpg',
                'google_maps' => 'https://www.google.com/maps/place/Termales+de+Santa+Rosa',
                'category' => 'relaxation',
                'climate' => 'Tropical',
                'latitude' => 5.2645,
                'longitude' => -75.6337,
                'services' => json_encode(['aguas termales', 'masajes']),
                'opening_time' => '09:00:00',
                'closing_time' => '21:00:00',
                'price_range' => 30.00,
                'contact_number' => '0345678907',
                'email' => 'info@termalessantarosa.com',
            ],
            [
                
                'name' => 'Spa del Parque',
                'description' => 'Spa y centro de bienestar en un entorno natural.',
                'location' => 'Medellín',
                'image_url' => 'https://www.spadelparque.com/images/relaxation10.jpg',
                'google_maps' => 'https://www.google.com/maps/place/Spa+del+Parque',
                'category' => 'relaxation',
                'climate' => 'Tropical',
                'latitude' => 6.2500,
                'longitude' => -75.5740,
                'services' => json_encode(['masajes', 'tratamientos de spa']),
                'opening_time' => '10:00:00',
                'closing_time' => '20:00:00',
                'price_range' => 50.00,
                'contact_number' => '0345678908',
                'email' => 'info@spadelparque.com',
            ],
            ]; 
                
            foreach ($relaxation_places as $relaxation_place) {
                RelaxationPlace::create($relaxation_place);
            }
            
        }
    }
