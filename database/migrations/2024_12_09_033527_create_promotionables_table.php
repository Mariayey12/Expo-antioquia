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
        Schema::create('promotionables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('promotion_id'); // Foreign key to promotions table
            $table->unsignedBigInteger('promotionable_id'); // ID of the related model
            $table->string('promotionable_type'); // Type of the related model (e.g., Product, Service)
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('cascade');

            // Indexes for polymorphic relationship
            $table->index(['promotionable_id', 'promotionable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotionables');
    }
};
