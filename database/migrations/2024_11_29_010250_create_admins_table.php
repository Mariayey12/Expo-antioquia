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
            $table->string('permissions')->nullable();
            $table->string('department')->nullable();
            $table->string('notes')->nullable();

            // Relación polimórfica: estos dos campos se generarán automáticamente con morphs()
            $table->morphs('userable'); // Crea 'userable_id' y 'userable_type'

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
