<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');  // Nombre de la empresa
            $table->string('contact_person');  // Persona de contacto
            $table->string('email')->nullable();  // Correo electrónico
            $table->string('phone')->nullable();  // Teléfono
            $table->text('address')->nullable();  // Dirección
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
}
