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
            $table->string('location'); // Ubicación del lugar
            $table->string('image_url'); // URL de la imagen del lugar
            $table->string('video_url'); // URL de un video relacionado
            $table->string('google_maps'); // URL de Google Maps
            $table->decimal('average_price', 8, 2)->nullable(); // Precio promedio
            $table->time('opening_time'); // Hora de apertura
            $table->time('closing_time'); // Hora de cierre
            $table->string('price_range'); // Rango de precios
            $table->string('contact_number'); // Número de contacto
            $table->string('email'); // Correo electrónico
            $table->string('address')->nullable(); // Dirección
            $table->string('city'); // Ciudad
            $table->integer('price_per_night'); // Precio por noche
            $table->string('phone_number'); // Teléfono
            $table->double('rating', 8, 2); // Calificación
            $table->string('website')->nullable(); // Página web
            $table->integer('capacity'); // Capacidad
            $table->json('menu')->nullable(); // Menú
            $table->date('date')->nullable(); // Fecha del lugar
            $table->date('event_date')->nullable(); // Fecha del evento
            $table->json('activities')->nullable(); // Actividades
            $table->integer('duration_days')->nullable(); // Duración en días
            $table->string('artists')->nullable(); // Artistas
            $table->string('artist')->nullable(); // Artista
            $table->decimal('latitude', 10, 6)->default(0.0); // Latitud
            $table->decimal('longitude', 10, 6)->default(0.0); // Longitud
            $table->string('provider_name')->nullable(); // Nombre del proveedor
            $table->string('contact_info')->nullable(); // Información de contacto
            $table->string('material')->nullable(); // Material
            $table->string('technique')->nullable(); // Técnica
            $table->decimal('price', 8, 2); // Precio del servicio
            $table->float('cost')->nullable(); // Costo
            $table->string('services')->nullable(); // Servicios
            $table->string('duration')->nullable(); // Duración del evento
            $table->boolean('is_active')->default(true); // Estado de actividad
            $table->json('opening_days')->nullable(); // Días de apertura
            $table->boolean('is_featured')->default(false); // Si es destacado
            $table->boolean('has_parking')->default(false); // Si tiene estacionamiento
            $table->boolean('is_renovated')->default(false); // Si ha sido renovado
            $table->date('last_renovation_date')->nullable(); // Fecha de la última renovación
            $table->string('price_range_category')->nullable(); // Categoría de rango de precios
            $table->integer('reviews_count')->default(0); // Número de reseñas
            $table->morphs('categorizable'); // Relación polimórfica con categorías
            $table->morphs('placeable'); // Relación polimórfica con otros modelos
            $table->timestamps(); // Fechas de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('places');
    }
}
