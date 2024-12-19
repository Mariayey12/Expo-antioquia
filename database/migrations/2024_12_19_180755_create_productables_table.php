<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductablesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('productables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // ID del producto
            $table->morphs('productable'); // Relación polimórfica
            $table->timestamps();

            // Llaves foráneas
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('productables');
    }
}

