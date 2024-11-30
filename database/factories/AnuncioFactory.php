<?php

namespace Database\Factories;

use App\Models\Anuncio;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnuncioFactory extends Factory
{
    protected $model = Anuncio::class;

    public function definition()
    {
        return [
            'area' => $this->faker->city,
            'categoria' => $this->faker->word,
            'provincia' => $this->faker->city,
            'localidad' => $this->faker->city,
            'direccion' => $this->faker->address,
            'cod_postal' => $this->faker->postcode,
            'titulo' => $this->faker->sentence,
            'contenido' => $this->faker->paragraph,
            'precio' => $this->faker->randomFloat(2, 10, 100),
            'autor' => $this->faker->name,
            'imagen_url' => $this->faker->imageUrl(),
            'link_externo' => $this->faker->url,
            'nombre' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'telefono' => $this->faker->phoneNumber,
            'acepto_condiciones' => $this->faker->boolean,
            'fecha_publicacion' => $this->faker->date(),
        ];
    }
}
