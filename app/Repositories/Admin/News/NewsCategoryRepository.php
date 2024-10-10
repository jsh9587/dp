<?php

namespace App\Repositories\Admin\News;

use App\Interfaces\Admin\News\NewsCategoryRepositoryInterface;
use App\Models\News\Category;
use App\Models\News\NewsCategory;

class NewsCategoryRepository implements NewsCategoryRepositoryInterface
{
    // 서비스 로직 구현
    public function findAll()
    {
        return Category::all();
    }

    public function create(NewsCategory $category)
    {
        if( $category->save() ){
            return true;
        }
        return false;
    }

    public function findByNewsId($newsId)
    {
        return NewsCategory::where('news_id', '=', $newsId)->first();
    }
    public function update(NewsCategory $category)
    {
        if( $category->save() ){
            return true;
        }
        return false;
    }
}
