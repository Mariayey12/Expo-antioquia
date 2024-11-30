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
            $table->enum('category', ['spa', 'hotel', 'tour', 'restaurant'])->nullable(); // Categoría del servicio
            $table->string('image_url')->nullable(); // URL de una imagen del servicio
            $table->string('provider_name')->nullable(); // Nombre del proveedor del servicio
            $table->string('location')->nullable(); // Ubicación donde se ofrece el servicio
            $table->boolean('is_available')->default(true); // Estado de disponibilidad del servicio
            $table->dateTime('available_from')->nullable(); // Fecha y hora desde la cual está disponible
            $table->dateTime('available_until')->nullable(); // Fecha y hora hasta la cual está disponible
            $table->string('contact_info')->nullable(); // Información de contacto para más detalles
            $table->enum('status', ['active', 'inactive', 'maintenance'])->default('active'); // Estado del servicio
            $table->integer('reviews_count')->default(0); // Número de reseñas
            $table->decimal('average_rating', 2, 1)->default(0); // Calificación promedio
            $table->timestamps();

            // Agregar índices en campos importantes
            $table->index('category');
            $table->index('provider_name');
            $table->index('location');

            // Relación polimórfica
            $table->morphs('serviceable'); // Crea las columnas `serviceable_id` y `serviceable_type`

            // Relación con la tabla 'places' (si es necesario)
            $table->foreignId('place_id')->constrained();
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
