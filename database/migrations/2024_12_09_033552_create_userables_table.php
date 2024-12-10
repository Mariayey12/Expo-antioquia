<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('userables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relación con la tabla users
            $table->string('userable_type'); // Tipo del modelo relacionado
            $table->unsignedBigInteger('userable_id'); // ID del modelo relacionado
            $table->timestamps();

            // Llave foránea para garantizar la integridad referencial
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('userables');
    }
};
