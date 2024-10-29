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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre obligatorio, no nulo
            $table->string('email')->unique(); // Email único
            $table->timestamp('email_verified_at')->nullable(); // Verificación de correo opcional
            $table->string('password'); // Contraseña encriptada obligatoria
            $table->string('phone')->nullable(); // Teléfono opcional
            $table->string('address')->nullable(); // Dirección opcional
            $table->enum('role', ['user', 'admin', 'superuser'])->default('user'); // Rol obligatorio
            $table->rememberToken()->nullable(); // Token de "recordar usuario" opcional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};


