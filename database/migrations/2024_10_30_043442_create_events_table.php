<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // ID auto incremental
            $table->string('name'); // Nombre del evento
            $table->text('description'); // Descripción del evento
            $table->string('location'); // Ubicación
            $table->string('climate')->nullable(); // Clima (opcional)
            $table->string('image_url')->nullable(); // URL de la imagen (opcional)
            $table->string('video_url')->nullable(); // URL del video (opcional)
            $table->string('google_maps')->nullable(); // URL de Google Maps (opcional)
            $table->decimal('latitude', 10, 8)->nullable(); // Latitud (opcional)
            $table->decimal('longitude', 11, 8)->nullable(); // Longitud (opcional)
            $table->string('category'); // Categoría del evento
            $table->date('date') ->nullable(); // Fecha del evento
            $table->timestamps(); // Fechas de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
