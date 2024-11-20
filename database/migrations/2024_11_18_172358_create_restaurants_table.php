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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del restaurante o café
            $table->text('description'); // Descripción detallada del lugar
            $table->string('location'); // Ubicación general, como una ciudad o región
            $table->string('image_url'); // URL de una imagen representativa
            $table->string('google_maps'); // Enlace de Google Maps para la ubicación
            $table->decimal('latitude', 10, 8)->nullable(); // Latitud para geolocalización
            $table->decimal('longitude', 11, 8)->nullable(); // Longitud para geolocalización
            $table->string('phone_number')->nullable(); // Número de teléfono del restaurante
            $table->string('email')->nullable(); // Correo electrónico de contacto
            $table->string('website')->nullable(); // Sitio web del restaurante o café
            $table->decimal('average_price', 8, 2)->nullable(); // Precio promedio por persona
            $table->json('menu')->nullable(); // Menú en formato JSON
            $table->json('services')->nullable(); // Servicios adicionales, como Wi-Fi, accesibilidad, etc.
            $table->string('video_url')->nullable(); // URL de un video relacionado, si aplica
            $table->string('category')->nullable(); // Categoría para especificar si es restaurante, café, etc.
            $table->integer('rating')->nullable(); // Calificación promedio del lugar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
