<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['image', 'video', 'text', 'other']);
            $table->string('content')->nullable();
            $table->string('path')->nullable();
            $table->foreignId('chat_id')
                ->references('id')
                ->on('chats');
            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
            $table->boolean('visible_to_me')->default(true);
            $table->boolean('visible_to_you')->default(true);
            $table->boolean('is_send')->default(false);
            $table->timestamps();
        });
        DB::statement("ALTER TABLE messages ADD CONSTRAINT not_null_content_and_path check( content IS NOT NULL OR path IS NOT NULL)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
