<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Mejores servicios 
          $services=[

                [
                
                    'name' => 'Servicio de Transporte Medellín',
                    'description' => 'Servicio de transporte privado en la ciudad.',
                    'location' => 'Medellín',
                    'image_url' => 'https://www.transporte.com/images/service1.jpg',
                    'video_url' => 'https://www.youtube.com/watch?v=example31',
                    'google_maps' => 'https://www.google.com/maps/place/Servicio+de+Transporte+Medellín',
                    'category' => 'service',
                    'provider_name' => 'Transporte Medellín',
                    'cost' => 10000.00,
                    'duration' => '1 hora',
                    'contact_info' => 'info@transporte.com',
                ],
                [
                    
                    'name' => 'Spa Relax',
                    'description' => 'Centro de relajación y bienestar.',
                    'location' => 'Medellín',
                    'image_url' => 'https://www.sparelax.com/images/service1.jpg',
                    'video_url' => 'https://www.youtube.com/watch?v=example31',
                    'google_maps' => 'https://www.google.com/maps/place/Spa+Relax',
                    'category' => 'service',
                    'provider_name' => 'Spa Relax',
                    'cost' => 50000.00,
                    'duration' => '2 horas',
                    'contact_info' => 'contacto@sparelax.com',
                ],
                [
                    
                    'name' => 'Masajes Terapéuticos',
                    'description' => 'Masajes para aliviar el estrés y la tensión.',
                    'location' => 'Medellín',
                    'image_url' => 'https://www.masajesterapeuticos.com/images/service2.jpg',
                    'google_maps' => 'https://www.google.com/maps/place/Masajes+Terap%C3%A9uticos',
                    'category' => 'service',
                    'provider_name' => 'Masajes Terapéuticos',
                    'cost' => 60000.00,
                    'duration' => '1 hora',
                    'contact_info' => 'info@masajesterapeuticos.com',
                ],
                [
                    
                    'name' => 'Centro de Yoga y Meditación',
                    'description' => 'Clases de yoga y meditación para todos los niveles.',
                    'location' => 'Medellín',
                    'image_url' => 'https://www.centrodemeditacion.com/images/service3.jpg',
                    'google_maps' => 'https://www.google.com/maps/place/Centro+de+Yoga+y+Meditaci%C3%B3n',
                    'category' => 'service',
                    'provider_name' => 'Centro de Yoga',
                    'cost' => 40000.00,
                    'duration' => '1.5 horas',
                    'contact_info' => 'contacto@centrodemeditacion.com',
                ],
                [
                    
                    'name' => 'Salón de Belleza Estilo',
                    'description' => 'Servicios de peluquería y estética.',
                    'location' => 'Medellín',
                    'image_url' => 'https://www.salonestilo.com/images/service4.jpg',
                    'google_maps' => 'https://www.google.com/maps/place/Sal%C3%B3n+de+Belleza+Estilo',
                    'category' => 'service',
                    'provider_name' => 'Salón Estilo',
                    'cost' => 30000.00,
                    'duration' => '2 horas',
                    'contact_info' => 'info@salonestilo.com',
                ],
                [
                    
                    'name' => 'Gimnasio Fitness',
                    'description' => 'Entrenamiento y clases de fitness.',
                    'location' => 'Medellín',
                    'image_url' => 'https://www.gimnasiofitness.com/images/service5.jpg',
                    'google_maps' => 'https://www.google.com/maps/place/Gimnasio+Fitness',
                    'category' => 'service',
                    'provider_name' => 'Gimnasio Fitness',
                    'cost' => 50000.00,
                    'duration' => 'Mensual',
                    'contact_info' => 'info@gimnasiofitness.com',
                ],
                [
                    
                    'name' => 'Centro de Terapia Alternativa',
                    'description' => 'Terapias alternativas para el bienestar físico y mental.',
                    'location' => 'Medellín',
                    'image_url' => 'https://www.centrodeterapiaalternativa.com/images/service6.jpg',
                    'google_maps' => 'https://www.google.com/maps/place/Centro+de+Terapia+Alternativa',
                    'category' => 'service',
                    'provider_name' => 'Centro de Terapia Alternativa',
                    'cost' => 70000.00,
                    'duration' => '1 hora',
                    'contact_info' => 'contacto@centrodeterapiaalternativa.com',
                ],
                [
                    
                    'name' => 'Tienda de Aromaterapia',
                    'description' => 'Productos de aromaterapia para el hogar y la salud.',
                    'location' => 'Medellín',
                    'image_url' => 'https://www.tiendaaromaterapia.com/images/service7.jpg',
                    'google_maps' => 'https://www.google.com/maps/place/Tienda+de+Aromaterapia',
                    'category' => 'service',
                    'provider_name' => 'Tienda de Aromaterapia',
                    'cost' => 25000.00,
                    'duration' => 'N/A',
                    'contact_info' => 'info@tiendaaromaterapia.com',
                ],
                [
                    
                    'name' => 'Peluquería y Estética Glamour',
                    'description' => 'Servicios de peluquería y tratamientos estéticos.',
                    'location' => 'Medellín',
                    'image_url' => 'https://www.peluqueriaestetica.com/images/service8.jpg',
                    'google_maps' => 'https://www.google.com/maps/place/Peluquer%C3%ADa+y+Est%C3%A9tica+Glamour',
                    'category' => 'service',
                    'provider_name' => 'Glamour Estética',
                    'cost' => 35000.00,
                    'duration' => '1.5 horas',
                    'contact_info' => 'info@peluqueriaestetica.com',
                ],
                [
                    
                    'name' => 'Masajes Relajantes',
                    'description' => 'Masajes para liberar tensiones y relajarse.',
                    'location' => 'Medellín',
                    'image_url' => 'https://www.masajesrelajantes.com/images/service9.jpg',
                    'google_maps' => 'https://www.google.com/maps/place/Masajes+Relajantes',
                    'category' => 'service',
                    'provider_name' => 'Masajes Relajantes',
                    'cost' => 60000.00,
                    'duration' => '1 hora',
                    'contact_info' => 'info@masajesrelajantes.com',
                ],
                [
                    
                    'name' => 'Centro de Bienestar Integral',
                    'description' => 'Enfoque holístico en salud y bienestar.',
                    'location' => 'Medellín',
                    'image_url' => 'https://www.centrobienestar.com/images/service10.jpg',
                    'google_maps' => 'https://www.google.com/maps/place/Centro+de+Bienestar+Integral',
                    'category' => 'service',
                    'provider_name' => 'Bienestar Integral',
                    'cost' => 80000.00,
                    'duration' => '1 hora',
                    'contact_info' => 'info@centrobienestar.com',
                ],

                ];
    
            foreach ($services as $service) {
                Service::create($service);
            }
    }
}
