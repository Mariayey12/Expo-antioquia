<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_userables_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserableTable extends Migration
{
    public function up()
    {
        Schema::create('userable', function (Blueprint $table) {
            $table->id();
            $table->morphs('userable'); // Crea userable_id y userable_type
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('userable');
    }
}
