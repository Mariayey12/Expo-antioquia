<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('title'); // Title of the promotion
            $table->text('description'); // Detailed description
            $table->decimal('discount_percentage', 5, 2)->nullable(); // Discount percentage (optional)
            $table->decimal('discount_amount', 10, 2)->nullable(); // Fixed discount amount (optional)
            $table->date('start_date'); // Promotion start date
            $table->date('end_date'); // Promotion end date
            $table->text('terms_conditions')->nullable(); // Terms and conditions (optional)
            $table->text('image_url')->nullable(); // Promotional image (optional)
            $table->boolean('is_active')->default(true); // Is the promotion active?
            $table->nullableMorphs('promotionable'); // Polymorphic relationship (can link to gastronomies, events, etc.)
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}

