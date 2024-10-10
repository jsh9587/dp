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
        Schema::create('news_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->constrained('news')->comment('뉴스 ID');
            $table->foreignId('category_id')->constrained('category')->comment('카테고리 ID');
            // 복합 기본 키 설정
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_category');
    }
};
