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
            $table->string('name'); // Asegúrate de que esta columna esté definida
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('company_name')->nullable();
            $table->json('services')->nullable();
            $table->timestamps();
        });


    }



    public function down()
    {
        Schema::dropIfExists('providers');
    }
}
