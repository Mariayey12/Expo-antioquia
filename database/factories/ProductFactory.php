<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * El nombre del modelo relacionado.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define el estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word, // Nombre del producto (una palabra aleatoria)
            'description' => $this->faker->paragraph, // Descripción del producto (un párrafo aleatorio)
            'price' => $this->faker->randomFloat(2, 5, 1000), // Precio del producto, con 2 decimales y en un rango de 5 a 1000
            'stock' => $this->faker->numberBetween(1, 100), // Stock disponible del producto (número aleatorio entre 1 y 100)
            'created_at' => now(), // Fecha de creación del producto (hora actual)
            'updated_at' => now(), // Fecha de actualización del producto (hora actual)
        ];
    }
}
