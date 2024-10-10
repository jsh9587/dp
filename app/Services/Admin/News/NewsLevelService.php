<?php

namespace App\Services\Admin\News;

use App\Interfaces\Admin\News\NewsLevelRepositoryInterface;
use App\Interfaces\Admin\News\NewsLevelServiceInterface;

class NewsLevelService implements NewsLevelServiceInterface
{
    // 서비스 로직 구현
    private NewsLevelRepositoryInterface $newsLevelRepository;
    public function __construct(NewsLevelRepositoryInterface $newsLevelRepository)
    {
        $this->newsLevelRepository = $newsLevelRepository;
    }

    public function findAll()
    {
        return $this->newsLevelRepository->findAll();
    }
}
