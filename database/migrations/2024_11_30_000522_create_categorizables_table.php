<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorizablesTable extends Migration
{
    public function up()
    {
        Schema::create('categorizables', function (Blueprint $table) {
            $table->id();
            $table->morphs('categorizable'); // Definición estándar de Laravel
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Llave foránea a la tabla categories
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categorizables');
    }
}
