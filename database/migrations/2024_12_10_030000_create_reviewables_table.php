<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviewables', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->unsignedBigInteger('review_id'); // ID de la reseña
            $table->morphs('reviewable'); // Crea columnas `reviewable_id` y `reviewable_type`
            $table->timestamps();

            // Llave foránea para la tabla `reviews_califications`
            $table->foreign('review_id')
                ->references('id')
                ->on('reviews_califications')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviewables');
    }
};

