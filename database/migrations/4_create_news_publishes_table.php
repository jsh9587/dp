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
        Schema::create('news_publish', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->comment('발행자');
            $table->timestamp('published_at')->nullable()->comment('발행일');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_publish');
    }
};
