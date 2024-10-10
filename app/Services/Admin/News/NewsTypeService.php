<?php

namespace App\Services\Admin\News;

use App\Interfaces\Admin\News\NewsTypeRepositoryInterface;
use App\Interfaces\Admin\News\NewsTypeServiceInterface;

class NewsTypeService implements NewsTypeServiceInterface
{
    // 서비스 로직 구현
    private NewsTypeRepositoryInterface $newsTypeRepository;
    public function __construct(NewsTypeRepositoryInterface $newsTypeRepository)
    {
        $this->newsTypeRepository = $newsTypeRepository;
    }

    public function findAll(){
        return $this->newsTypeRepository->findAll();
    }


}
