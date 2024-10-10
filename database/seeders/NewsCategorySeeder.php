<?php

namespace Database\Seeders;

use App\Models\News\Category;
use App\Models\News\News;
use App\Models\News\NewsCategory;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $news = News::all();
        $category = Category::all();

        foreach ($news as $new) {
            $randomCategory = $category->random(rand(1, 1)); // 1에서 3개까지 랜덤으로 선택
            foreach ($randomCategory as $cate) {
                // UserPermit에 새 레코드 생성
                NewsCategory::create([
                    'news_id' => $new->id,
                    'category_id' => $cate->id,
                ]);
            }
        }


    }
}
