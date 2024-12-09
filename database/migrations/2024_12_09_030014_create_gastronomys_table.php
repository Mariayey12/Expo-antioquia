<?php
// Migration: 2024_12_02_000000_create_gastronomias_table.php
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
        Schema::create('gastronomias', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the gastronomic place
            $table->text('description'); // Description
            $table->string('type'); // Type (Restaurant, Café, Bar, etc.)
            $table->string('location'); // Location
            $table->string('image_url'); // Image URL
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gastronomys');
    }
};

