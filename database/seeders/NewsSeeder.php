<?php

namespace Database\Seeders;

use App\Models\News\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        News::factory(500)->create();
    }
}
