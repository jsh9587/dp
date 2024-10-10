<?php

namespace App\Services\Admin\News;

use App\Interfaces\Admin\News\NewsHistoryRepositoryInterface;
use App\Interfaces\Admin\News\NewsHistoryServiceInterface;
use App\Models\News\NewsHistory;

class NewsHistoryService implements NewsHistoryServiceInterface
{
    // 서비스 로직 구현

    private NewsHistoryRepositoryInterface $newsHistoryRepository;

    public function __construct(NewsHistoryRepositoryInterface $newsHistoryRepository)
    {
        $this->newsHistoryRepository = $newsHistoryRepository;
    }

    public function store($newsId, $content):bool
    {
        // TODO: Implement store() method.
        $newsHistory = new NewsHistory();
        $newsHistory->fill([
           'news_id' => $newsId,
           'previous_content' => $content
        ]);
        return $this->newsHistoryRepository->create($newsHistory);
    }
    public function findById(int $id)
    {
        return $this->newsHistoryRepository->findById($id);
    }
    public function findByNewsId(int $newsId)
    {
        return $this->newsHistoryRepository->findByNewsIdOrderByCreatedAt($newsId);
    }



}
