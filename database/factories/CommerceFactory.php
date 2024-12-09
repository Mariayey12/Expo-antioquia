<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommerceFactory extends Factory
{
    /**
     * El modelo asociado con esta fábrica.
     *
     * @var string
     */
    protected $model = \App\Models\Commerce::class;

    /**
     * Define los valores predeterminados para los atributos del modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company, // Nombre del comercio
            'description' => $this->faker->realTextBetween(100, 200), // Descripción realista
            'location' => $this->faker->address, // Dirección simulada
            'image_url' => $this->faker->imageUrl(640, 480, 'business', true, 'Commerce'), // Imagen
            'video_url' => $this->faker->optional()->url, // URL del video (opcional)
            'google_maps' => $this->faker->optional()->url, // URL de Google Maps (opcional)
            'contact_number' => $this->faker->optional()->e164PhoneNumber, // Número de contacto
            'email' => $this->faker->optional()->unique()->safeEmail, // Email único
            'website' => $this->faker->optional()->url, // Página web (opcional)

            // Relación polimórfica
            'commerceable_type' => $this->faker->randomElement([
                \App\Models\Place::class,   // Relación con lugares
                \App\Models\Hotel::class,  // Relación con hoteles
            ]),
            'commerceable_id' => $this->faker->numberBetween(1, 50), // ID aleatorio relacionado
        ];
    }
}
