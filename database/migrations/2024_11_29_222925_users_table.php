<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Ejecutar la migración.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('role'); // Admin, Proveedor, Cliente, etc.
            $table->string('userable_type'); // Tipo del modelo relacionado polimórfico
            $table->unsignedBigInteger('userable_id'); // ID del modelo relacionado polimórfico
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Revertir la migración.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
