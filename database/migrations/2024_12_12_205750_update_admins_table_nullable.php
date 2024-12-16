<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            // Permite valores nulos en las columnas
            $table->string('userable_type')->nullable()->change();
            $table->unsignedBigInteger('userable_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            // Vuelve a hacer que las columnas no acepten valores nulos
            $table->string('userable_type');
            $table->unsignedBigInteger('userable_id')->nullable(false)->change();
        });
    }
};
