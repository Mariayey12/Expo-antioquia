<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del lugar
            $table->text('description'); // Descripción del lugar
            $table->string('location'); // Ubicación (no nullable)
            $table->string('climate'); // Clima del lugar (no nullable)
            $table->string('image_url'); // URL de la imagen (no nullable)
            $table->string('video_url'); // URL del video (no nullable)
            $table->string('google_maps'); // URL de Google Maps (no nullable)
            $table->string('category')->default('default_value'); // Categoría (no nullable)
            $table->decimal('average_price', 8, 2)->nullable();
            $table->timestamps(); // Timestamps para created_at y updated_at
            $table->json('services'); // Servicios ofrecidos en formato JSON (no nullable)
            $table->time('opening_time'); // Hora de apertura (no nullable)
            $table->time('closing_time'); // Hora de cierre (no nullable)
            $table->string('price_range'); // Rango de precios (no nullable)
            $table->string('contact_number'); // Número de contacto (no nullable)
            $table->string('email'); // Correo electrónico (no nullable)
            $table->string('address'); // Dirección (no nullable)
            $table->string('city'); // Ciudad (no nullable)
            $table->integer('price_per_night'); // Precio por noche (no nullable)
            $table->string('phone_number'); // Número de teléfono (no nullable)
            $table->double('rating', 8, 2); // Calificación (no nullable)
            $table->string('website'); // Sitio web (no nullable)
            $table->integer('capacity'); // Capacidad (no nullable)
            $table->json('menu'); // Menú en formato JSON (no nullable)
            $table->date('date'); // Fecha del evento (no nullable)
            $table->date('event_date'); // Fecha del evento (no nullable)
            $table->json('activities'); // Actividades en formato JSON (no nullable)
            $table->integer('duration_days'); // Duración en días (no nullable)
            $table->string('artists'); // Artistas involucrados (no nullable)
            $table->string('artist'); // Nombre del artista (no nullable)
            $table->float('latitude')->default(0.0); // Latitud, valor por defecto 0.0 (no nullable)
            $table->float('longitude')->default(0.0); // Longitud, valor por defecto 0.0 (no nullable)
            $table->string('provider_name'); // Nombre del proveedor (no nullable)
            $table->string('contact_info'); // Información de contacto (no nullable)
            $table->string('material'); // Material (no nullable)
            $table->string('technique'); // Técnica utilizada (no nullable)
            $table->decimal('price', 8, 2); // Precio (no nullable)
            $table->float('cost'); // Costo (no nullable)
            $table->string('duration'); // Duración (no nullable)
            
$table->string('category_name')->nullable();

// En tu migración para la tabla "places"

$table->string('categories')->default('default_value'); // según lo que necesites

        });
    }

    public function down()
    {
        Schema::dropIfExists('places');
    }
}

