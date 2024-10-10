<?php

namespace Database\Seeders;

use App\Models\News\NewsType;
use Illuminate\Database\Seeder;

class NewsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        NewsType::create(
            ['name'=>'자체기사'],
        );
        NewsType::create(
            ['name'=>'보도자료'],
        );

    }
}
