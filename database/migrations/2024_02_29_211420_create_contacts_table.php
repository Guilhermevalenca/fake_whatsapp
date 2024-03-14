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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
            $table->foreignId('contact')
                ->references('id')
                ->on('users');
            $table->foreignId('chat_id')
                ->nullable()
                ->references('id')
                ->on('chats');
            $table->boolean('contact_blocked')->default(false);
            $table->unique(['user_id', 'contact']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatcs');
    }
};
