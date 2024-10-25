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
        Schema::create('lugares_relajacion', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del lugar de relajación
            $table->text('description'); // Descripción del lugar
            $table->string('location'); // Ubicación del lugar (ciudad, dirección)
            $table->string('climate')->nullable(); // Clima del lugar (opcional)
            $table->string('image_url')->nullable(); // URL de la imagen representativa
            $table->string('video_url')->nullable(); // URL de un video del lugar (opcional)
            $table->string('google_maps')->nullable(); // Enlace a la ubicación en Google Maps
            $table->string('category')->default('relaxation'); // Categoría, por defecto "relaxation"
            $table->decimal('latitude', 10, 8)->nullable(); // Latitud para la geolocalización
            $table->decimal('longitude', 11, 8)->nullable(); // Longitud para la geolocalización
            $table->json('services')->nullable(); // Lista de servicios como masajes, spa, meditación, etc.
            $table->time('opening_time')->nullable(); // Hora de apertura
            $table->time('closing_time')->nullable(); // Hora de cierre
            $table->decimal('price_range', 8, 2)->nullable(); // Rango de precios o tarifa promedio
            $table->string('contact_number')->nullable(); // Número de contacto
            $table->string('email')->nullable(); // Correo electrónico de contacto
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lugares_relajacion');
    }
};
