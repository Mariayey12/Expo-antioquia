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
        Schema::create('tourist_places', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del lugar turístico
            $table->text('description'); // Descripción del lugar
            $table->string('location'); // Ubicación (ciudad, lugar específico)
            $table->string('climate')->nullable(); // Clima del lugar
            $table->string('image_url')->nullable(); // URL de la imagen
            $table->string('video_url')->nullable(); // URL del video (YouTube, etc.)
            $table->string('google_maps')->nullable(); // URL de Google Maps
            $table->string('category')->default('tourist'); // Categoría (por defecto "tourist")
            $table->decimal('latitude', 10, 8)->nullable(); // Latitud para la geolocalización
            $table->decimal('longitude', 11, 8)->nullable(); // Longitud para la geolocalización
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourist_places');
    }
};
