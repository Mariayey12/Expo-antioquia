<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('company_name')->nullable(); // O usa 'string' si la columna es de tipo texto
            $table->string('password');
            $table->string('phone')->nullable(); // Teléfono opcional
            $table->string('address')->nullable(); // Dirección opcional
            $table->string('profile_picture')->nullable(); // Foto de perfil
            $table->enum('role', ['administrador', 'usuario', 'proveedor'])->default('usuario'); // Roles predefinidos
            $table->morphs('userable');// Relación polimórfica
            $table->text('services')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

