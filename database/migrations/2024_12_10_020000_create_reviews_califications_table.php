


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews_califications', function (Blueprint $table) {
            $table->id(); // Identificador único de la calificación
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con usuarios
            $table->morphs('rateable'); // Crea columnas `rateable_id` y `rateable_type`
            $table->integer('rating')->default(0); // Calificación numérica (por ejemplo, 1-5)
            $table->text('review')->nullable(); // Comentario opcional
            $table->boolean('is_active')->default(true); // Estado de la calificación
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews_califications');
    }
};
