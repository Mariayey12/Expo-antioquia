
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
        Schema::create('reviews_califications', function (Blueprint $table) {
            $table->id(); // Identificador único de la calificación
            $table->unsignedBigInteger('user_id'); // ID del usuario que realiza la calificación
            $table->unsignedBigInteger('reviewable_id'); // ID del elemento que recibe la calificación (polimórfico)
            $table->string('reviewable_type'); // Tipo de entidad que recibe la calificación
            $table->integer('rating')->default(0); // Calificación numérica
            $table->text('review')->nullable(); // Comentario o reseña
            $table->timestamps(); // Fechas de creación y actualización
        });

        // Llave foránea con usuarios
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
};
