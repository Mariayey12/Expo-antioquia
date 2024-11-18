<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->string('area'); // Área o región del anuncio
            $table->string('categoria'); // Categoría del anuncio
            $table->string('provincia')->nullable(); // Provincia (opcional)
            $table->string('localidad')->nullable(); // Localidad (opcional)
            $table->string('direccion')->nullable(); // Dirección (opcional)
            $table->string('cod_postal')->nullable(); // Código postal (opcional)
            $table->string('titulo'); // Título del anuncio
            $table->text('contenido')->nullable(); // Contenido o descripción del anuncio
            $table->decimal('precio', 10, 2)->nullable(); // Precio del anuncio (opcional)
            $table->string('autor')->nullable(); // Autor del anuncio (opcional)
            $table->string('imagen_url')->nullable(); // URL de la imagen (opcional)
            $table->string('link_externo')->nullable(); // Enlace externo (opcional)
            $table->string('nombre')->nullable(); // Nombre del contacto
            $table->string('email')->nullable(); // Email de contacto
            $table->string('telefono')->nullable(); // Teléfono de contacto
            $table->boolean('acepto_condiciones')->default(false); // Confirmación de términos
            $table->date('fecha_publicacion')->nullable(); // Fecha de publicación
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anuncios');
    }
}
