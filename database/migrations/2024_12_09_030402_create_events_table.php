<?php

// Migration: 2024_12_02_000001_create_events_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del evento
            $table->text('description'); // Descripción
            $table->string('location'); // Ubicación
            $table->dateTime('start_date'); // Fecha de inicio
            $table->dateTime('end_date'); // Fecha de fin
            $table->string('image_url'); // URL de la imagen
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
