<?php

namespace App\Repositories\Admin\News;

use App\Interfaces\Admin\News\NewsLevelRepositoryInterface;
use App\Models\News\NewsLevel;

class NewsLevelRepository implements NewsLevelRepositoryInterface
{
    // 서비스 로직 구현
    public function findAll()
    {
        return NewsLevel::all();
    }
}
