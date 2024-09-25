<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('제목');
            $table->text('content')->comment('내용');
            $table->foreignId('status_id')
                ->constrained('news_status') // 외래 키 제약 조건 추가
                ->onDelete('set null')
                ->comment('뉴스 상태 ID');
            $table->foreignId('author_id')
                ->constrained('news_author')
                ->onDelete('set null')
                ->comment('뉴스 저자 ID');
            $table->foreignId('category_id')
                ->constrained('news_category')
                ->onDelete('set null')
                ->comment('뉴스 카테고리 ID');
            $table->foreignId('publish_id')
                ->constrained('news_publish')
                ->onDelete('set null')
                ->comment('뉴스 발행 ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
