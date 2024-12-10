<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsCalificationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews_califications', function (Blueprint $table) {
            $table->id(); // Identificador único de la calificación
            $table->unsignedBigInteger('user_id'); // ID del usuario que realiza la calificación
            $table->unsignedBigInteger('rateable_id'); // ID del elemento que recibe la calificación (puede ser un restaurante, evento, etc.)
            $table->string('rateable_type'); // Tipo de entidad que recibe la calificación (Polimórfico)
            $table->integer('rating')->default(0); // Calificación numérica (por ejemplo, 1-5)
            $table->text('review')->nullable(); // Reseña o comentario (opcional)
            $table->boolean('is_active')->default(true); // Estado de la calificación (activa o no)
            $table->timestamps(); // Tiempos de creación y actualización
        });

        // Relación con la tabla de usuarios
        Schema::table('reviews_califications', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews_califications');
    }
}
