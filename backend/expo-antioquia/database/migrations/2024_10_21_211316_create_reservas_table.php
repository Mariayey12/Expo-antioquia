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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id'); // ID del usuario que realiza la reserva
            $table->unsignedBigInteger('servicio_id'); // ID del servicio reservado
            $table->date('fecha_reserva'); // Fecha de la reserva
            $table->time('hora_reserva'); // Hora de la reserva
            $table->integer('cantidad_personas')->nullable(); // Cantidad de personas para la reserva
            $table->string('estado')->default('pendiente'); // Estado de la reserva (pendiente, confirmada, cancelada, etc.)
            $table->text('notas')->nullable(); // Notas adicionales sobre la reserva
            $table->timestamps();
            
            // Definir las claves foráneas
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};

