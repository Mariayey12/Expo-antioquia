<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anuncio;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ads::create([
            'area' => 'Antioquia',
            'categoria' => 'Gastronomía',
            'provincia' => 'Medellín',
            'localidad' => 'El Poblado',
            'direccion' => 'Calle Ficticia #123',
            'cod_postal' => '050010',
            'titulo' => 'Deliciosa comida típica antioqueña',
            'contenido' => 'Anuncio sobre un restaurante típico de la región.',
            'precio' => 25000.00,
            'autor' => 'Juan Pérez',
            'imagen_url' => 'http://example.com/imagen.jpg',
            'link_externo' => 'http://example.com',
            'nombre' => 'Juan Pérez',
            'email' => 'juanperez@email.com',
            'telefono' => '3001234567',
            'acepto_condiciones' => true,
            'fecha_publicacion' => '2024-11-19',
        ]);
    }
}
