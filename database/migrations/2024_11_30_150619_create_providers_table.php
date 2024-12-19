<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->text('description')->nullable(); // Descripción
            $table->string('profile_picture')->nullable(); // Imagen de perfil o logo
            $table->string('website')->nullable(); // Sitio web
            $table->string('company_name')->nullable();
            $table->string('contact_person'); // Agregado según tu referencia en el seeder
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('providers');
    }
}
