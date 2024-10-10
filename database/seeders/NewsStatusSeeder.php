<?php

namespace Database\Seeders;

use App\Models\News\NewsStatus;
use Illuminate\Database\Seeder;

class NewsStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        NewsStatus::create([
            'name'=>'저장'
        ]);
        NewsStatus::create([
            'name'=>'발행'
        ]);
        NewsStatus::create([
            'name'=>'반려'
        ]);
        NewsStatus::create([
            'name'=>'삭제'
        ]);
    }
}
