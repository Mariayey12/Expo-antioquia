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
        Schema::create('gastronomies', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the gastronomic place
            $table->text('description'); // Description
            $table->string('address'); // Address
            $table->string('city'); // City
            $table->json('contact_info')->nullable(); // Contact information (e.g., phone, email)
            $table->string('opening_hours')->nullable(); // Opening hours
            $table->enum('cost_range', ['low', 'medium', 'high']); // Cost range
            $table->string('image_url', 2048)->nullable(); // Featured image URL
            $table->string('video_url', 2048)->nullable(); // Video URL (optional)
            $table->string('google_maps', 2048)->nullable(); // Google Maps URL
            $table->text('specialties')->nullable(); // Specialties or main dishes
            $table->decimal('latitude', 10, 8)->nullable(); // Latitude for location
            $table->decimal('longitude', 11, 8)->nullable(); // Longitude for location
            $table->boolean('is_open')->default(false); // Is the place open?
            $table->decimal('average_rating', 3, 2)->default(0); // Average rating (e.g., 4.5)
            $table->unsignedInteger('reviews_count')->default(0); // Reviews count
            $table->nullableMorphs('gastronomiceables'); // Polymorphic relation 
            $table->timestamps();

            // Index for faster geospatial queries
            $table->index(['latitude', 'longitude']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gastronomies');
    }
};
