<?php

namespace App\Interfaces\Admin\News;

use App\Models\News\NewsHashTag;

interface NewsHashTagRepositoryInterface
{
    //
    public function create(NewsHashTag $newsHashTag);
    public function delete(NewsHashTag $newsHashTag);

    public function findByNewsId(int $newsId);
}
