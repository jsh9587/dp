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
        Schema::create('news_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->constrained('news')->comment('뉴스 ID');
            $table->text('previous_content')->comment('변경전 내용');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_history');
    }
};
