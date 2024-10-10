<?php

namespace App\Repositories\Admin\News;

use App\Interfaces\Admin\News\NewsTypeRepositoryInterface;
use App\Models\News\NewsType;

class NewsTypeRepository implements NewsTypeRepositoryInterface
{
    // 서비스 로직 구현
    public function findAll()
    {
        return NewsType::all();
    }
}
