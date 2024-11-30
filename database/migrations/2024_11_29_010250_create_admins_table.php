<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('permissions')->nullable(); // Permisos específicos
            $table->string('department')->nullable();  // Departamento del
            $table->string('notes')->nullable();       // Notas adicionales sobre el administrador
            $table->timestamps(); // Marcas de tiempo
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};

