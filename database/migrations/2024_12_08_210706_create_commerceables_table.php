<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommerceablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commerceables', function (Blueprint $table) {
            $table->id(); // Id de la relación
            $table->morphs('commerceable'); // Este campo genera dos columnas: commerceable_id y commerceable_type
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Relación con categorías
            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commerceables');
    }
}