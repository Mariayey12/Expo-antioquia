<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta la migración para crear la tabla 'users'.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique(); // Correo electrónico único
            $table->timestamp('email_verified_at')->nullable(); // Fecha de verificación del correo
            $table->string('company_name')->nullable(); // Nombre de la empresa (opcional)
            $table->string('password');
            $table->string('contact_person')->nullable(); // Persona de contacto (opcional)
            $table->string('phone')->nullable(); // Teléfono (opcional)
            $table->string('address')->nullable(); // Dirección (opcional)
            $table->string('profile_picture')->nullable(); // Foto de perfil (opcional)
            $table->enum('role', ['administrador', 'usuario', 'proveedor'])->default('usuario'); // Roles predefinidos
            $table->rememberToken(); // Token para recordar sesión
            $table->morphs('userable'); // Esto crea automáticamente userable_type y userable_id
            $table->timestamps(); // Tiempos de creación y actualización
        });
    }

    /**
     * Revierte la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

