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
        Schema::create('gastronomy', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del lugar o plato típico
            $table->text('description'); // Descripción detallada
            $table->string('location'); // Ubicación general, como una ciudad o región
            $table->string('image_url'); // URL de la imagen representativa
            $table->string('google_maps'); // Enlace de Google Maps para la ubicación
            $table->string('category'); // Categoría (ej. plato típico, restaurante, café)
            $table->decimal('latitude', 10, 8)->nullable(); // Latitud para geolocalización
            $table->decimal('longitude', 11, 8)->nullable(); // Longitud para geolocalización
            $table->string('video_url')->nullable(); // URL de un video relacionado, si aplica
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gastronomy');
    }
};
