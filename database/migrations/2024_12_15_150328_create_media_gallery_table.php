<?php
  // database/migrations/xxxx_xx_xx_create_media_gallery_table.php
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

        {
            Schema::create('media_gallery', function (Blueprint $table) {
                $table->id();
                $table->foreignId('product_id')->constrained()->onDelete('cascade');
                $table->string('media_type'); // imagen, video, etc.
                $table->string('url'); // URL de la imagen o video
                $table->morphs('mediable'); // Esto crea las columnas mediable_type y mediable_id
                $table->timestamps();
            });
        }
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_gallery');
    }
};
