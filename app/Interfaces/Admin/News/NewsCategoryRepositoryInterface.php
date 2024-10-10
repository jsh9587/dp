<?php

namespace App\Interfaces\Admin\News;

use App\Models\News\NewsCategory;

interface NewsCategoryRepositoryInterface
{
    //
    public function findAll();
    public function create(NewsCategory $category);

    public function findByNewsId($newsId);
    public function update(NewsCategory $category);

}
