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
            $table->id(); // ID del servicio
            $table->string('name'); // Nombre del servicio (obligatorio)
            $table->text('description')->nullable(); // Descripción del servicio (opcional)
            $table->decimal('cost', 10, 2)->nullable(); // Costo del servicio (opcional)
            $table->string('duration')->nullable(); // Duración del servicio (opcional)
            $table->string('image_url')->nullable(); // URL de una imagen del servicio (opcional)
            $table->string('video_url')->nullable(); // URL de un video relacionado con el servicio (opcional)
            $table->string('google_maps')->nullable(); // URL de Google Maps (opcional)
            $table->string('provider_name')->nullable(); // Nombre del proveedor (opcional)
            $table->string('location')->nullable(); // Ubicación (opcional)
            $table->boolean('is_available')->default(true); // Disponibilidad (obligatorio)
            $table->dateTime('available_from')->nullable(); // Disponible desde (opcional)
            $table->dateTime('available_until')->nullable(); // Disponible hasta (opcional)
            $table->string('contact_info')->nullable(); // Información de contacto (opcional)
            $table->enum('status', ['active', 'inactive', 'maintenance'])->default('active'); // Estado (obligatorio)
            $table->integer('reviews_count')->default(0); // Número de reseñas (opcional)
            $table->decimal('average_rating', 2, 1)->default(0); // Calificación promedio (opcional)
            $table->timestamps(); // Timestamps: created_at y updated_at

            // Índices
            $table->index('provider_name');
            $table->index('location');

            // Relación polimórfica
            $table->morphs('serviceable'); // Relación con otros modelos

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
