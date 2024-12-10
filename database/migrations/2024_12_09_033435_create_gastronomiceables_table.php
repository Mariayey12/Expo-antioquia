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
        Schema::create('gastronomiceables', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->unsignedBigInteger('gastronomy_id'); // ID de gastronomía
            $table->unsignedBigInteger('gastronomiceable'); // ID del modelo relacionado
            $table->timestamps();

            // Llave foránea para garantizar la relación con la tabla 'gastronomies'
            $table->foreign('gastronomy_id')
                  ->references('id')
                  ->on('gastronomies')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gastronomiceables');
    }
};
