<?php


namespace Database\Factories;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 500),
            'stock' => $this->faker->numberBetween(1, 100),
            'categorizable_id' => $this->faker->randomNumber(),
            'categorizable_type' => 'App\Models\Category', // Puedes cambiarlo según la relación
            'userable_id' => $this->faker->randomNumber(),
            'userable_type' => 'App\Models\User', // Puedes cambiarlo según el tipo de usuario
        ];
    }

    // Método para asociar promociones
    public function withPromotions($promotions = null)
    {
        return $this->afterCreating(function (Product $product) use ($promotions) {
            if (!$promotions) {
                $promotions = Promotion::inRandomOrder()->take(2)->pluck('id');
            }

            $product->promotions()->sync($promotions);
        });
    }
}


