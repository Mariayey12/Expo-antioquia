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
            $table->string('contact_info'); // Contact information
            $table->string('opening_hours'); // Opening hours
            $table->enum('cost_range', ['low', 'medium', 'high']); // Cost range
            $table->text('image_url')->nullable(); // Featured image URL
            $table->text('video_url')->nullable(); // Video URL (optional)
            $table->text('google_maps')->nullable(); // Google Maps URL
            $table->text('specialties')->nullable(); // Specialties or main dishes
            $table->decimal('latitude', 10, 8)->nullable(); // Latitude for location
            $table->decimal('longitude', 11, 8)->nullable(); // Longitude for location
            $table->boolean('is_open')->default(false); // Is the place open?
            $table->decimal('average_rating', 3, 2)->default(0); // Average rating (e.g., 4.5)
            $table->unsignedInteger('reviews_count')->default(0); // Reviews count
            $table->nullableMorphs('commerceable'); // Polymorphic relation (if necessary)
            $table->timestamps();
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











