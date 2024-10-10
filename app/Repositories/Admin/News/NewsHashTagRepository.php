<?php

namespace App\Repositories\Admin\News;

use App\Interfaces\Admin\News\NewsHashTagRepositoryInterface;
use App\Models\News\NewsHashTag;
use Illuminate\Support\Facades\Log;

class NewsHashTagRepository implements NewsHashTagRepositoryInterface
{
    // 서비스 로직 구현
    public function create(NewsHashTag $newsHashTag)
    {
        if (!$newsHashTag->save()) {
            // You can log the errors to see why it's not saving
            Log::error('Failed to save NewsHashTag:', $newsHashTag->getErrors());
            return false;
        }
        return $newsHashTag;
    }
    public function delete(NewsHashTag $newsHashTag):bool
    {
        if (!$newsHashTag->delete()) {
            return false;
        }
        return true;
    }

    public function findByNewsId(int $newsId)
    {
        return NewsHashTag::where('news_id', $newsId)->get();
    }

}
