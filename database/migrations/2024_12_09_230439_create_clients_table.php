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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();

            // Relación con User
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con la tabla users

            // Campos para la relación polimórfica
            $table->morphs('clientable'); // Esto crea 'clientable_id' y 'clientable_type'

            // Campo de estado de membresía (opcional)
            $table->enum('membership_status', ['basic', 'premium'])->default('basic'); // Membresía de cliente

            // Campos adicionales (opcional)
            $table->string('phone_number')->nullable(); // Teléfono del cliente
            $table->string('address')->nullable(); // Dirección del cliente

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};

