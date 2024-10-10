<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermitSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            NewsStatusSeeder::class,
            NewsPublishSeeder::class,
            NewsTypeSeeder::class,
            NewsLevelSeeder::class,
            NewsFlagSeeder::class,
            NewsSeeder::class,
            NewsCategorySeeder::class,
        ]);
    }
}
