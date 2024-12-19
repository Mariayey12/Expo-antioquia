<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('clientables', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->morphs('clientable'); // Esta línea crea 'clientable_id' y 'clientable_type' automáticamente
            $table->string('name'); // Nombre del cliente (puedes agregar más campos si es necesario)
            $table->string('email')->unique(); // Correo electrónico del cliente
            $table->timestamps(); // Fechas de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientables');
    }
};

