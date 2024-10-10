<?php

namespace App\Services\Admin\News;

use App\Interfaces\Admin\News\NewsFlagRepositoryInterface;
use App\Interfaces\Admin\News\NewsFlagServiceInterface;

class NewsFlagService implements NewsFlagServiceInterface
{
    // 서비스 로직 구현
    private NewsFlagRepositoryInterface $newsRepository;
    public function __construct(NewsFlagRepositoryInterface $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function findByType(int $type)
    {
        return $this->newsRepository->findByType($type);
    }
}
