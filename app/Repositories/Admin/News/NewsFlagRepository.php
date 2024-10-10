<?php

namespace App\Repositories\Admin\News;

use App\Interfaces\Admin\News\NewsFlagRepositoryInterface;
use App\Models\News\NewsFlag;

class NewsFlagRepository implements NewsFlagRepositoryInterface
{
    // 서비스 로직 구현
    public function findByType(int $type)
    {
        return NewsFlag::where('type', $type)->get();
    }
}
