<?php

namespace App\Interfaces\Admin\News;

use App\Models\News\NewsHistory;

interface NewsHistoryRepositoryInterface
{
    //

    public function create(NewsHistory $news);
    public function findByNewsIdOrderByCreatedAt(int $newsId);
    public function findById(int $newsId);
}
