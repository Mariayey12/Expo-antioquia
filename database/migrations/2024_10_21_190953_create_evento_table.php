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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description');
            $table->string('location');
            $table->string('image_url');
            $table->string('climate')->nullable();
            $table->decimal('latitude', 10, 8)->nullable(); // Campo para latitud
            $table->decimal('longitude', 11, 8)->nullable(); // Campo para longitud
            $table->string('google_map_url')->nullable(); // URL del mapa de Google
            $table->string('category')->nullable(); // Categoría del evento
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

