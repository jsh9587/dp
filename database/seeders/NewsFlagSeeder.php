<?php

namespace Database\Seeders;

use App\Models\News\NewsFlag;
use Illuminate\Database\Seeder;

class NewsFlagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        NewsFlag::create([
            'type' => 1,
            'name' => '분석'
        ]);
        NewsFlag::create([
            'type' => 1,
            'name' => '현장'
        ]);
        NewsFlag::create([
            'type' => 1,
            'name' => '해설'
        ]);
        NewsFlag::create([
            'type' => 1,
            'name' => 'DP초대석'
        ]);
        NewsFlag::create([
            'type' => 1,
            'name' => '미래포럼'
        ]);
        NewsFlag::create([
            'type' => 1,
            'name' => '카드뉴스'
        ]);
        NewsFlag::create([
            'type' => 1,
            'name' => '웹툰복약지도'
        ]);
        NewsFlag::create([
            'type' => 1,
            'name' => '단독(내부집계용)'
        ]);
        NewsFlag::create([
            'type' => 1,
            'name' => '영문뉴스'
        ]);

        NewsFlag::create([
            'type' => 2,
            'name' => '요약'
        ]);
        NewsFlag::create([
            'type' => 2,
            'name' => '인포스탁뉴스'
        ]);
        NewsFlag::create([
            'type' => 2,
            'name' => '팩트체크'
        ]);
        NewsFlag::create([
            'type' => 2,
            'name' => '단독기사'
        ]);
        NewsFlag::create([
            'type' => 2,
            'name' => 'DP_FOCUS'
        ]);
    }
}
