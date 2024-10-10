<?php

namespace Database\Seeders;

use App\Models\News\NewsPublish;
use Illuminate\Database\Seeder;

class NewsPublishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        NewsPublish::factory()->count(500)->create();
    }
}
