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
        Schema::create('culture', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del evento o manifestación cultural
            $table->text('description'); // Descripción detallada
            $table->string('location'); // Ubicación general, como una ciudad o región
            $table->string('image_url'); // URL de una imagen representativa
            $table->string('video_url')->nullable(); // URL de un video relacionado, como una presentación o documental
            $table->string('google_maps')->nullable(); // Enlace a Google Maps para la ubicación
            $table->decimal('latitude', 10, 8)->nullable(); // Latitud para geolocalización
            $table->decimal('longitude', 11, 8)->nullable(); // Longitud para geolocalización
            $table->date('event_date')->nullable(); // Fecha de un evento cultural específico
            $table->string('category')->nullable(); // Categoría del evento (ejemplo: festival, tradición, exposición)
            $table->json('activities')->nullable(); // Actividades que se realizan en el evento, en formato JSON
            $table->integer('duration_days')->nullable(); // Duración del evento en días
            $table->json('artists')->nullable(); // Artistas o grupos culturales que participan, en formato JSON
            $table->string('contact_info')->nullable(); // Información de contacto (teléfono, email)
            $table->string('website')->nullable(); // Sitio web oficial del evento o la manifestación cultural
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('culture');
    }
};
