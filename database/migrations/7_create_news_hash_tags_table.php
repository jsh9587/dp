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
        Schema::create('news_hash_tag', function (Blueprint $table) {
            $table->id();
            $table->integer('news_id')->index()->comment('뉴스 ID');
            $table->string('hash_tag',100)->comment('해시태그');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_hash_tag');
    }
};
