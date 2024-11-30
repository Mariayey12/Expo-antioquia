<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('location');
            $table->string('image_url');
            $table->string('video_url');
            $table->string('google_maps');
            $table->decimal('latitude', 10, 7)->default(0.0);
            $table->decimal('longitude', 10, 7)->default(0.0);
            $table->json('services');
            $table->decimal('price_per_night', 8, 2);
            $table->string('phone_number');
            $table->string('email');
            $table->string('website');
            $table->integer('capacity');
            $table->decimal('rating', 2, 1);
            $table->string('address');
            $table->string('city');
            $table->decimal('average_price', 8, 2);
            $table->time('opening_time');
            $table->time('closing_time');
            $table->string('price_range');
            $table->string('contact_number');
            $table->json('menu');
            $table->dateTime('date');
            $table->dateTime('event_date');
            $table->json('activities');
            $table->integer('duration_days');
            $table->string('artists');
            $table->string('artist');
            $table->string('provider_name');
            $table->string('contact_info');
            $table->string('material');
            $table->string('technique');
            $table->decimal('price', 8, 2);
            $table->decimal('cost', 8, 2);
            $table->boolean('is_active');
            $table->json('opening_days');
            $table->boolean('is_featured');
            $table->boolean('has_parking');
            $table->boolean('is_renovated');
            $table->date('last_renovation_date');
            $table->string('price_range_category');
            $table->integer('reviews_count');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('places');
    }
}
