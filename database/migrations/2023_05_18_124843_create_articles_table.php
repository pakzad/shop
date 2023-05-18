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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->varchar('heading');
            $table->varchar('slug')->unique();
            $table->text('content');
            $table->varchar('title')->nullable();
            $table->text('description')->nullable();
            $table->varchar('canonical')->nullable();
            $table->boolean('is_index')->default(1);
            $table->foreignId('user_id');
            $table->foreignId('image_id');
            $table->varchar('canonical');
            $table->unsignedSmallInteger('status');
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('image_id')->references('id')->on('images')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
