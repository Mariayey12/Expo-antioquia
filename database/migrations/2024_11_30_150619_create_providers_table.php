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
            $table->string('company_name')->nullable(); // Nombre de la empresa
            $table->string('contact_person')->nullable(); // Persona de contacto
            $table->text('address')->nullable(); // Dirección
            $table->text('services')->nullable(); // Servicios prestados
            $table->timestamps();
        });

    }



    public function down()
    {
        Schema::dropIfExists('providers');
    }
}
