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
use App\Models\Booking; // Añadido
use App\Models\Reservation; // Añadido
use Faker\Factory as Faker;

class ProviderSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Usuarios de ejemplo (puedes generar más según tus necesidades)
        $users = User::factory()->count(5)->create(); // Generar 5 usuarios aleatorios

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
            // Más proveedores aquí...
        ];

        foreach ($providers as $providerData) {
            // Seleccionar un usuario aleatorio para la relación polimórfica
            $randomUser = $users->random();

            // Crear el proveedor con la relación polimórfica establecida
            $provider = Provider::create([
                'name' => $providerData['name'],
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'description' => $providerData['description'],
                'profile_picture' => $faker->imageUrl(200, 200),
                'website' => $faker->url,
                'company_name' => $faker->company,
                'contact_person' => $faker->name,
                'userable_type' => get_class($randomUser), // Modelo del usuario relacionado
                'userable_id' => $randomUser->id, // ID del usuario relacionado
            ]);

            // Relacionar con categorías, servicios y productos
            $category = Category::firstOrCreate(['name' => $providerData['category']]);
            $provider->categories()->attach($category);

            $this->createServicesAndProducts($provider, $providerData['category']);

            // Relacionar con lugares, anuncios y blogs
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

            // Relacionar con reservas y bookings
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
        }
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

        return $products[$category] ?? [];
        $this->command->info('Proveedores insertados exitosamente.\n');
    }

    private function getServicesByCategory($category) { /* Tu lógica actual */ }
    private function getProductsByCategory($category) { /* Tu lógica actual */ }
}






