<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provider;
use App\Models\Service;
use App\Models\Product;
use App\Models\Category;
use App\Models\Place;
use App\Models\Anuncio;
use App\Models\Blog;
use App\Models\User;
use App\Models\Booking;
use App\Models\Reservation;
use App\Models\Gastronomy;
use App\Models\Event;
use Faker\Factory as Faker;

class ProvidersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Generar usuarios aleatorios
        $users = User::factory()->count(5)->create();

        $providers = [
            [
                'name' => 'Hotel El Paraíso',
                'category' => 'Hoteles',
                'location' => 'Antioquia, Colombia',
                'contact' => 'info@paraiso.com',
                'description' => 'Hotel de lujo con vistas espectaculares y servicios exclusivos.',
            ],
            [
                'name' => 'Restaurante La Hacienda',
                'category' => 'Restaurantes',
                'location' => 'Medellín, Colombia',
                'contact' => 'contacto@lahacienda.com',
                'description' => 'Restaurante tradicional con especialidades locales y menú gourmet.',
            ],
        ];

        foreach ($providers as $providerData) {
            // Seleccionar un usuario aleatorio para la relación polimórfica
            $randomUser = $users->random();

            // Crear el proveedor
            $provider = Provider::create([
                'name' => $providerData['name'],
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'address' => $providerData['location'],
                'description' => $providerData['description'],
                'profile_picture' => $faker->imageUrl(200, 200),
                'website' => $faker->url,
                'company_name' => $faker->company,
                'contact_person' => $faker->name,
                'userable_type' => get_class($randomUser),
                'userable_id' => $randomUser->id,
            ]);

            // Relacionar categorías
            $category = Category::firstOrCreate(['name' => $providerData['category']]);
            $provider->categories()->attach($category);

            // Crear servicios y productos
            $this->createServicesAndProducts($provider, $providerData['category']);

            // Crear lugares, anuncios y blogs
            Place::create([
                'provider_id' => $provider->id,
                'name' => $providerData['name'] . ' Place',
                'description' => $providerData['description'],
            ]);

            Anuncio::create([
                'provider_id' => $provider->id,
                'title' => 'Oferta especial en ' . $providerData['name'],
                'content' => 'Aprovecha nuestras promociones exclusivas para este mes.',
                'active' => true,
            ]);

            Blog::create([
                'provider_id' => $provider->id,
                'title' => 'Conoce más sobre ' . $providerData['name'],
                'content' => 'En este blog hablamos de las experiencias únicas que puedes vivir en ' . $providerData['name'] . '.',
            ]);

            // Crear reservas y bookings
            Reservation::create([
                'provider_id' => $provider->id,
                'user_id' => $randomUser->id,
                'notes' => 'Primera reserva de ejemplo.',
                'quantity' => 1,
                'status' => 'pendiente',
                'reservation_date' => $faker->dateTimeBetween('now', '+1 month'),
            ]);

            Booking::create([
                'provider_id' => $provider->id,
                'user_id' => $randomUser->id,
                'booking_date' => $faker->dateTimeBetween('-1 month', 'now'),
                'details' => 'Reserva previa del usuario.',
            ]);

            // Crear registros de gastronomía
            Gastronomy::create([
                'provider_id' => $provider->id,
                'name' => $providerData['name'] . ' Gastronomy',
                'description' => 'Disfruta de los mejores platillos en ' . $providerData['name'],
                'specialties' => 'Comida local y gourmet',
            ]);

            // Crear eventos
            Event::create([
                'provider_id' => $provider->id,
                'title' => 'Evento especial en ' . $providerData['name'],
                'description' => 'Únete a nuestro evento exclusivo en ' . $providerData['name'] . '.',
                'event_date' => $faker->dateTimeBetween('now', '+1 month'),
                'location' => $providerData['location'],
            ]);
        }

        $this->command->info('Proveedores, gastronomía y eventos insertados exitosamente.');
    }

    /**
     * Crear servicios y productos para un proveedor basado en su categoría.
     *
     * @param Provider $provider
     * @param string $category
     */
    private function createServicesAndProducts($provider, $category)
    {
        $services = $this->getServicesByCategory($category);
        foreach ($services as $serviceName) {
            Service::create([
                'provider_id' => $provider->id,
                'name' => $serviceName,
            ]);
        }

        $products = $this->getProductsByCategory($category);
        foreach ($products as $productName) {
            Product::create([
                'provider_id' => $provider->id,
                'name' => $productName,
            ]);
        }
    }

    /**
     * Obtener servicios según la categoría.
     *
     * @param string $category
     * @return array
     */
    private function getServicesByCategory($category)
    {
        $services = [
            'Hoteles' => ['Reserva de habitaciones', 'Paquetes especiales', 'Experiencias personalizadas'],
            'Restaurantes' => ['Reservas en línea', 'Menús especiales', 'Catering y organización de eventos'],
        ];

        return $services[$category] ?? [];
    }

    /**
     * Obtener productos según la categoría.
     *
     * @param string $category
     * @return array
     */
    private function getProductsByCategory($category)
    {
        $products = [
            'Hoteles' => ['Kits de bienvenida', 'Souvenirs locales', 'Artículos de baño exclusivos'],
            'Restaurantes' => ['Salsas gourmet', 'Condimentos locales', 'Panadería artesanal'],
        ];

        return $products[$category] ?? [];
        $this->command->info('Proveedores insertados exitosamente.\n');
    }
}





