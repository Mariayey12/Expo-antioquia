<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommerceTable extends Migration
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
            $table->string('name'); // Nombre (obligatorio)
            $table->text('description'); // Descripción (obligatoria)
            $table->string('location'); // Ubicación (obligatoria)
            $table->string('image_url')->nullable(); // URL de la imagen (opcional)
            $table->string('video_url')->nullable(); // URL del video (opcional)
            $table->string('google_maps')->nullable(); // URL de Google Maps (opcional)
            $table->string('category'); // Categoría (obligatoria)
            $table->string('contact_number')->nullable(); // Número de contacto (opcional)
            $table->string('email')->unique(); // Correo electrónico (único)
            $table->string('website')->nullable(); // Página web (opcional)
            $table->json('categories')->nullable(); // Arreglo JSON para categorías (opcional)

            // Relación polimórfica
            $table->morphs('commerceable'); // Relación polimórfica, creando 'commerceable_id' y 'commerceable_type'

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
