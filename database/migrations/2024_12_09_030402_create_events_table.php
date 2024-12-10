<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->string('name'); // Nombre del evento
            $table->text('description'); // Descripción detallada
            $table->string('type'); // Tipo de evento (festival, concierto, feria, etc.)
            $table->dateTime('start_date'); // Fecha y hora de inicio
            $table->dateTime('end_date'); // Fecha y hora de finalización
            $table->string('location'); // Ubicación física o virtual
            $table->decimal('cost', 10, 2)->nullable(); // Costo de entrada (puede ser gratuito)
            $table->string('organizer_name'); // Nombre del organizador o empresa
            $table->string('contact_info'); // Información de contacto del organizador
            $table->text('image_url')->nullable(); // Imagen destacada del evento
            $table->text('video_url')->nullable(); // Video promocional del evento (opcional)
            $table->text('google_maps')->nullable(); // URL para Google Maps
            $table->boolean('is_active')->default(true); // Estado del evento (activo/inactivo)
            $table->float('average_rating', 2, 1)->default(0); // Calificación promedio basada en reseñas
            $table->unsignedInteger('reviews_count')->default(0); // Cantidad de reseñas
            $table->nullableMorphs('eventable'); // Relación polimórfica (por ejemplo, con gastronomías, cultura, etc.)
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
