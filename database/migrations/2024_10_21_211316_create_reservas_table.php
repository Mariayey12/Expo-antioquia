<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID del usuario que realiza la reserva
            $table->unsignedBigInteger('service_id'); // ID del servicio reservado
            $table->date('fecha_reserva'); // Fecha de la reserva
            $table->time('hora_reserva'); // Hora de la reserva
            $table->integer('cantidad_personas')->nullable(); // Cantidad de personas para la reserva
            $table->string('estado')->default('pendiente'); // Estado de la reserva (pendiente, confirmada, cancelada, etc.)
            $table->text('notas')->nullable(); // Notas adicionales sobre la reserva
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
