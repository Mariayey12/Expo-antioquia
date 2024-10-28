
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable(); // Nombre del lugar
            $table->text('description')->nullable(); // Descripción del lugar
            $table->string('location')->nullable(); // Ubicación
            $table->string('climate')->nullable(); // Clima
            $table->string('image_url')->nullable(); // URL de la imagen
            $table->string('video_url')->nullable(); // URL del video (opcional)
            $table->string('google_maps')->nullable(); // Enlace de Google Maps
            $table->time('opening_time')->nullable(); // Hora de apertura (opcional)
            $table->string('category')->default('default_value'); // Categoría (no nullable)
            $table->decimal('average_price', 8, 2)->nullable();
            $table->json('services')->nullable(); // Servicios ofrecidos en formato JSON (no nullable)
           $table->time('closing_time')->default('22:00:00');
            $table->string('price_range')->nullable(); // Rango de precios (no nullable)
            $table->string('contact_number')->nullable(); // Número de contacto (no nullable)
            $table->string('email')->nullable(); // Correo electrónico (no nullable)
            $table->string('address')->nullable(); // Dirección (no nullable)
            $table->string('city')->nullable(); // Ciudad (no nullable)
            $table->integer('price_per_night')->nullable(); // Precio por noche (no nullable)
            $table->string('phone_number')->nullable(); // Número de teléfono (no nullable)
            $table->double('rating', 8, 2)->nullable(); // Calificación (no nullable)
            $table->string('website')->nullable(); // Sitio web (no nullable)
            $table->integer('capacity')->nullable(); // Capacidad (no nullable)
            $table->json('menu')->nullable(); // Menú en formato JSON (no nullable)
            $table->date('date')->nullable(); // Fecha del evento (no nullable)
            $table->date('event_date')->nullable(); // Fecha del evento (no nullable)
            $table->json('activities')->nullable(); // Actividades en formato JSON (no nullable)
            $table->integer('duration_days')->nullable(); // Duración en días (no nullable)
            $table->string('artists')->nullable(); // Artistas involucrados (no nullable)
            $table->string('artist')->nullable(); // Nombre del artista (no nullable)
            $table->float('latitude')->default(0.0); // Latitud, valor por defecto 0.0 (no nullable)
            $table->float('longitude')->default(0.0); // Longitud, valor por defecto 0.0 (no nullable)
            $table->string('provider_name')->nullable(); // Nombre del proveedor (no nullable)
            $table->string('contact_info')->nullable(); // Información de contacto (no nullable)
            $table->string('material')->nullable(); // Material (no nullable)
            $table->string('technique')->nullable(); // Técnica utilizada (no nullable)
            $table->decimal('price', 8, 2)->nullable(); // Precio (no nullable)
            $table->string('remember_token')->nullable();
            $table->string('email_verified_at')->nullable();
            $table->float('cost')->nullable(); // Costo (no nullable)
            $table->string('duration')->nullable(); // Duración (no nullable)
            $table->string('categories')->default('default_value'); // según lo que necesites
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};



