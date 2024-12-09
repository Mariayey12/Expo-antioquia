<?php

// Migration: 2024_12_02_000002_create_promotions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Título de la promoción
            $table->text('description'); // Descripción de la promoción
            $table->decimal('discount', 5, 2); // Descuento en porcentaje
            $table->foreignId('gastronomia_id')->constrained()->onDelete('cascade'); // Relación con gastronomía
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
