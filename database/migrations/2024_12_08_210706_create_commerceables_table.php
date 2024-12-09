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
            $table->id(); // ID único
            $table->unsignedBigInteger('commerce_id'); // ID del comercio
            $table->unsignedBigInteger('commerceable_id'); // ID del modelo relacionado
            $table->string('commerceable_type'); // Tipo del modelo relacionado (e.g., App\Models\Place)
            $table->timestamps(); // Fechas de creación y actualización

            // Llave foránea para la relación con la tabla commerces
            $table->foreign('commerce_id')->references('id')->on('commerces')->onDelete('cascade');
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
