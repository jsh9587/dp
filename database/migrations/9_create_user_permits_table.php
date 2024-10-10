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
        Schema::create('user_permit', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->constrained('users')
                ->comment('사용자 ID');
            $table->foreignId('permit_id')
                ->constrained('permits') // permits 테이블의 id 컬럼을 참조
                ->comment('허가 ID');
            // 복합 기본 키 설정
            $table->primary(['permit_id', 'user_id']);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_permit');
    }
};
