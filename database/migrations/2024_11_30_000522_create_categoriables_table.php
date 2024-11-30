<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_categoriables_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriablesTable extends Migration
{
    public function up()
    {
        Schema::create('categoriables', function (Blueprint $table) {
            $table->id();
            $table->morphs('categoriable'); // Crea categoriable_id y categoriable_type
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categoriables');
    }
}
