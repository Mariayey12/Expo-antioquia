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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id'); // ID del usuario que hace el comentario
            $table->unsignedBigInteger('servicio_id')->nullable(); // ID del servicio comentado (opcional)
            $table->text('contenido'); // Contenido del comentario
            $table->integer('calificacion')->nullable(); // Calificación (opcional)
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};

