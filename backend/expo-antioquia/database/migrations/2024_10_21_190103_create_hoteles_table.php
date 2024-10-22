<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hoteles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->integer('rating')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price_per_night', 8, 2)->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->integer('capacity')->nullable();
            $table->json('services')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps();
            $table->decimal('latitude', 10, 8)->nullable(); // Agregar campo de latitud
            $table->decimal('longitude', 11, 8)->nullable(); // Agregar campo de longitud
            $table->string('category')->nullable(); // Agrega la columna categoria
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hoteles');
    }
};

