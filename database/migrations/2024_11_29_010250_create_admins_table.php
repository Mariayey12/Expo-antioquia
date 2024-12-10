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
                $table->string('permissions')->nullable(); // Permisos, ¿en formato texto o JSON?
                $table->string('department')->nullable();  // Departamento asociado
                $table->string('notes')->nullable();       // Notas adicionales

                $table->timestamps();
            });


     
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
