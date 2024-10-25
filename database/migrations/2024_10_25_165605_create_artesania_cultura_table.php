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
        Schema::create('artesania_cultura', function (Blueprint $table) {
            
                $table->id();
            $table->foreignId('artesanias_id')->constrained('artesanias')->onDelete('cascade');
            $table->foreignId('cultura_id')->constrained('cultura')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artesania_cultura');
    }
};

