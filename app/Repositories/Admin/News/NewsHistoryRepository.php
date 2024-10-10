<?php

namespace App\Repositories\Admin\News;

use App\Interfaces\Admin\News\NewsHistoryRepositoryInterface;
use App\Models\News\NewsHistory;

class NewsHistoryRepository implements NewsHistoryRepositoryInterface
{
    // 서비스 로직 구현
    public function create(NewsHistory $news): bool
    {
        if( $news->save() ){
            return true;
        }
        return false;
    }
    public function findByNewsIdOrderByCreatedAt(int $newsId)
    {
        return NewsHistory::where('news_id', '=', $newsId)->orderBy('created_at', 'desc')->get();
    }
    public function findById(int $id): ?NewsHistory
    {
        return NewsHistory::find($id);
    }
}
