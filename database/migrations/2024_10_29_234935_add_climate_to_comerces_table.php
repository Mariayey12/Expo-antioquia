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
        Schema::table('comerces', function (Blueprint $table) {
             $table->string('climate')->after('location'); // Ajusta la posición según sea necesario
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comerces', function (Blueprint $table) {
            $table->dropColumn('climate');
            //
        });
    }
};
