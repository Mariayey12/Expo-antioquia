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

        {
            Schema::create('chat_messages', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('seller_id');
                $table->text('message');
                $table->timestamps();
                $table->foreignId('sender_id')->constrained('clients')->onDelete('cascade');
               $table->foreignId('receiver_id')->constrained('clients')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
            });
        }

    }
    // database/migrations/xxxx_xx_xx_create_chat_messages_table.php


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
    }
};
