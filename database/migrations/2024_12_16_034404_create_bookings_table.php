<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservation_id'); // Relación con la reserva
            $table->unsignedBigInteger('user_id'); // Relación con el usuario
            $table->unsignedBigInteger('provider_id'); // Relación con el proveedor
            $table->unsignedBigInteger('place_id'); // Relación con el lugar
            $table->enum('status', ['booked', 'cancelled'])->default('booked'); // Estado de la reserva
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}

