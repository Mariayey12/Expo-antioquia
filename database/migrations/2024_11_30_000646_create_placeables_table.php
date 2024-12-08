<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_placeables_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceablesTable extends Migration
{
    public function up()
    {
        Schema::create('placeables', function (Blueprint $table) {
            $table->id();
            $table->morphs('placeable'); // Crea placeable_id y placeable_type
            $table->foreignId('place_id')->constrained()->onDelete('cascade'); // Llave foránea a la tabla categories
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('placeables');
    }
}
