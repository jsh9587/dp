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
            $table->string('name')->comment('뉴스에 출력될 이름');
            $table->string('title')->comment('제목');
            $table->string('list_title')->nullable()->comment('리스트형 제목');
            $table->string('sub_title')->nullable()->comment('부제목');
            $table->text('content')->comment('내용');
            $table->foreignId('status_id')
                ->nullable()
                ->default(1)
                ->constrained('news_status') // 외래 키 제약 조건 추가
                ->onDelete('set null')
                ->comment('뉴스 상태 ID');
            $table->foreignId('author_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null')
                ->comment('뉴스 저자 ID');
            $table->foreignId('publish_id')
                ->nullable()
                ->constrained('news_publish')
                ->onDelete('set null')
                ->comment('뉴스 발행 ID');
            $table->foreignId('type_id')
                ->nullable(false)
                ->constrained('news_type')
                ->comment('뉴스 타입 ID');
            $table->foreignId('level_id')
                ->nullable(false)
                ->constrained('news_level')
                ->comment('뉴스 레벨 ID');
            $table->foreignId('flag1_id')
                ->nullable()
                ->constrained('news_flag')
                ->comment('뉴스 Flag1 ID');
            $table->foreignId('flag2_id')
                ->nullable()
                ->constrained('news_flag')
                ->comment('뉴스 Flag2 ID');
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
