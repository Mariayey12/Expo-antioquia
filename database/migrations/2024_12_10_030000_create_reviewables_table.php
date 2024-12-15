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
            $table->unsignedBigInteger('review_id'); // ID de la calificación/reseña
            $table->unsignedBigInteger('product_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('number_of_people');
            $table->morphs('reviewable'); // Crea columnas `reviewable_id` y `reviewable_type`
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->enum('status', ['pending', 'confirmed', 'cancelled']);
            $table->text('notes')->nullable();
            $table->timestamps();

            // Llave foránea para la tabla `reviews_califications`
            $table->foreign('review_id')
                ->references('id')
                ->on('reviews_califications')
                ->onDelete('cascade');
                $table->foreignId('user_id')->constrained()->onDelete('cascade');

    $table->foreign('product_id')
    ->references('id')
    ->on('products')
    ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviewables');
    }
};
