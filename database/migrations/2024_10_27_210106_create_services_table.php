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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del servicio
            $table->text('description')->nullable(); // Descripción del servicio
            $table->decimal('cost', 10, 2)->nullable(); // Costo del servicio
            $table->string('duration')->nullable(); // Duración del servicio
            $table->string('category')->nullable(); // Categoría del servicio
            $table->string('image_url')->nullable(); // URL de una imagen del servicio
            $table->string('provider_name')->nullable(); // Nombre del proveedor del servicio
            $table->string('location')->nullable(); // Ubicación donde se ofrece el servicio
            $table->boolean('is_available')->default(true); // Estado de disponibilidad del servicio
            $table->date('available_from')->nullable(); // Fecha desde la cual está disponible
            $table->date('available_until')->nullable(); // Fecha hasta la cual está disponible
            $table->string('contact_info')->nullable(); // Información de contacto para más detalles
            $table->string('google_maps')->nullable(); // URL de Google Maps
            $table->string('video_url')->nullable(); // URL del video
            $table->timestamps();
        });
    
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
