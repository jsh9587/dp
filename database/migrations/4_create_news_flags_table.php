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
        Schema::create('news_flag', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->nullable(false)->comment('Flag Type');
            $table->string('name')->nullable(false)->comment('Flag Name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_flag');
    }
};
