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
        Schema::create('blog_news', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->string('title'); // Título de la noticia
            $table->text('content'); // Contenido de la noticia
            $table->string('author')->nullable(); // Autor de la noticia
            $table->string('featured_image')->nullable(); // URL de la imagen destacada
            $table->timestamp('published_at')->nullable(); // Fecha y hora de publicación
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_news');
    }
};
