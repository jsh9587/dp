<?php

namespace Database\Seeders;

use App\Models\News\NewsLevel;
use Illuminate\Database\Seeder;

class NewsLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        NewsLevel::create(['name'=>'Top Head']);
        NewsLevel::create(['name'=>'Main Head']);
        NewsLevel::create(['name'=>'Head']);
        NewsLevel::create(['name'=>'Normal']);
        NewsLevel::create(['name'=>'Brief']);
        NewsLevel::create(['name'=>'Sub Top']);
        NewsLevel::create(['name'=>'Sub Top2']);
        NewsLevel::create(['name'=>'Sub Top3']);
        NewsLevel::create(['name'=>'창고기사']);

    }
}
