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
        Schema::create('reviewables', function (Blueprint $table) {

            $table->id(); // Identificador único
            $table->unsignedBigInteger('reviewcalification_id'); // ID de reviews_califications
            $table->unsignedBigInteger('reviewable'); // ID del modelo relacionado
            $table->timestamps();

            // Llave foránea para garantizar la relación con la tabla 'reviews_califications'
            $table->foreign('reviewcalification_id')
                  ->references('id')
                  ->on('reviews_califications')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviewables');
    }
};


