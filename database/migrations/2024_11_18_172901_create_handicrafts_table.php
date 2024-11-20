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
        Schema::create('handicrafts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre de la artesanía
            $table->text('description'); // Descripción detallada de la artesanía
            $table->string('location'); // Ubicación donde se produce la artesanía
            $table->string('image_url'); // URL de una imagen representativa de la artesanía
            $table->string('material')->nullable(); // Material utilizado (ejemplo: barro, madera, tejido)
            $table->string('technique')->nullable(); // Técnica utilizada (ejemplo: alfarería, tejido a mano)
            $table->decimal('price', 8, 2)->nullable(); // Precio de la artesanía
            $table->json('categories')->nullable(); // Categorías de la artesanía en formato JSON (ejemplo: ["decoración", "útiles"])
            $table->string('artist')->nullable(); // Nombre del artesano o artista que la crea
            $table->string('contact_info')->nullable(); // Información de contacto del artista o tienda
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('handicrafts');
    }
};
