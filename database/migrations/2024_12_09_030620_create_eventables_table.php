<?php

// Migration: 2024_12_02_000003_create_eventables_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventablesTable extends Migration
{
    public function up()
    {
        Schema::create('eventables', function (Blueprint $table) {
            $table->id();
            $table->morphs('eventable'); // Relación polimórfica
            $table->foreignId('event_id')->constrained()->onDelete('cascade'); // Relación con el evento
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eventables');
    }
}
