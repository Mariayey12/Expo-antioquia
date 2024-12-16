<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provider;
use App\Models\User;
use App\Models\Service;

class ProvidersTableSeeder extends Seeder
{
    public function run()
    {

            Provider::factory(10)->create(); // Crear 10 proveedores ficticios
        // Crear un proveedor con datos específicos
        $provider = Provider::create([
            'name' => 'Proveedor Test',
            'email' => 'testprovider@example.com',
            'phone' => '1234567890',
            'address' => '123 Main St',
            'company_name' => 'Proveedor S.A.',
            'contact_person' => 'Juan Pérez', // Cambiado a un nombre significativo
        ]);

        // Crear un usuario asociado al proveedor (relación polimórfica)
        $user = User::create([
            'name' => 'Proveedor User',
            'email' => 'proveedoruser@example.com',
            'password' => bcrypt('password123'),
            'userable_type' => Provider::class, // Usar el nombre de la clase como string
            'userable_id' => $provider->id, // Usar el ID del proveedor creado
        ]);

        // Crear servicios asociados al proveedor (relación polimórfica)
        $service1 = Service::create([
            'name' => 'Consultoría',
            'description' => 'Servicios de consultoría en tecnologías.',
        ]);

        $service2 = Service::create([
            'name' => 'Soporte Técnico',
            'description' => 'Soporte técnico para equipos informáticos.',
        ]);

        // Asociar los servicios al proveedor usando la relación polimórfica
        $provider->services()->saveMany([$service1, $service2]);

        // Crear más proveedores con datos aleatorios y asociar servicios
        Provider::factory()
            ->count(8)
            ->create()
            ->each(function ($provider) {
                // Crear servicios aleatorios para cada proveedor
                $services = Service::factory()->count(2)->create();
                $provider->services()->saveMany($services);
            });
            $this->command->info('Proveedores insertados exitosamente.\n');
    }
}
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Category;
use App\Models\Provider;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Crear categorías de ejemplo
        $category1 = Category::create(['name' => 'Electronics']);
        $category2 = Category::create(['name' => 'Home Appliances']);
        $category3 = Category::create(['name' => 'Furniture']);

        // Crear proveedores de ejemplo
        $provider1 = Provider::create(['name' => 'Tech Corp']);
        $provider2 = Provider::create(['name' => 'Home Essentials']);
        $provider3 = Provider::create(['name' => 'FurniCo']);

        // Crear productos con datos completos, incluyendo la categoría y proveedor
        $product1 = Product::create([
            'name' => 'Smartphone',
            'description' => 'Latest model with advanced features.',
            'price' => 299.99,
            'stock' => 50,
            'categorizable_id' => $category1->id,
            'categorizable_type' => 'App\Models\Category',
            'userable_id' => $provider1->id,
            'userable_type' => 'App\Models\Provider',
        ]);

        $product2 = Product::create([
            'name' => 'Blender',
            'description' => 'Powerful blender for everyday use.',
            'price' => 79.99,
            'stock' => 30,
            'categorizable_id' => $category2->id,
            'categorizable_type' => 'App\Models\Category',
            'userable_id' => $provider2->id,
            'userable_type' => 'App\Models\Provider',
        ]);

        $product3 = Product::create([
            'name' => 'Sofa',
            'description' => 'Comfortable sofa for your living room.',
            'price' => 499.99,
            'stock' => 10,
            'categorizable_id' => $category3->id,
            'categorizable_type' => 'App\Models\Category',
            'userable_id' => $provider3->id,
            'userable_type' => 'App\Models\Provider',
        ]);

        // Crear promociones de ejemplo
        $promotion1 = Promotion::create([
            'name' => 'Black Friday Deal',
            'description' => 'Massive discounts for Black Friday!',
            'discount' => 30.00,
            'start_date' => now(),
            'end_date' => now()->addMonth(1),
        ]);

        $promotion2 = Promotion::create([
            'name' => 'Winter Sale',
            'description' => 'Save up to 20% on selected products.',
            'discount' => 20.00,
            'start_date' => now()->addMonth(1),
            'end_date' => now()->addMonth(2),
        ]);

        // Relacionando productos con promociones
        $product1->promotions()->attach($promotion1->id);
        $product2->promotions()->attach([$promotion1->id, $promotion2->id]);
        $product3->promotions()->attach($promotion2->id);
        $this->command->info('Proveedores insertados exitosamente.\n');
    }
}
