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
        Schema::create('comerces', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del comercio
            $table->text('description')->nullable(); // Descripción del comercio
            $table->string('location'); // Ubicación del comercio
            $table->string('contact_number')->nullable(); // Número de contacto
            $table->string('email')->nullable(); // Correo electrónico
            $table->string('website')->nullable(); // URL del sitio web
            $table->json('categories')->nullable(); // Categorías del comercio en formato JSON
            $table->string('image_url')->nullable(); // URL de una imagen del comercio
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comerces');
    }
};

