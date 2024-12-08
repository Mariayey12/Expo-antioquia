<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commerces', function (Blueprint $table) {
            $table->id(); // Auto-incremental ID
            $table->string('name')->nullable(); // Nombre (obligatorio)
            $table->text('description')->nullable(); // Descripción (obligatoria)
            $table->string('location')->nullable(); // Ubicación (obligatoria)
            $table->string('image_url')->nullable(); // URL de la imagen (opcional)
            $table->string('video_url')->nullable(); // URL del video (opcional)
            $table->string('google_maps')->nullable(); // URL de Google Maps (opcional)
            $table->string('contact_number')->nullable(); // Número de contacto (opcional)
            $table->string('email')->nullable();
            $table->string('website')->nullable(); // Página web (opcional)

            // Relación polimórfica
            $table->morphs('commerceable'); // Relación polimórfica, creando 'commerceable_id' y 'commerceable_type'
            $table->morphs('categorizable'); // Relación polimórfica con categorías
            //$table->morphs('placeable'); // Relación polimórfica con otros modelos
            $table->timestamps(); // Timestamps de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commerces'); // Borrar la tabla si es necesario
    }
}
