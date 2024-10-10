<?php

namespace App\Services\Admin\News;

use App\Interfaces\Admin\News\NewsCategoryRepositoryInterface;
use App\Interfaces\Admin\News\NewsCategoryServiceInterface;
use App\Models\News\NewsCategory;

class NewsCategoryService implements NewsCategoryServiceInterface
{
    // 서비스 로직 구현
    private NewsCategoryRepositoryInterface $newsCategoryRepository;
    public function __construct(NewsCategoryRepositoryInterface $newsCategoryRepository)
    {
        $this->newsCategoryRepository = $newsCategoryRepository;
    }

    public function findAll()
    {
        return $this->newsCategoryRepository->findAll();
    }

    public function store(int $newsId, int $categoryId)
    {
        $category = new NewsCategory();
        $data = [
            'news_id' => $newsId,
            'category_id' => $categoryId
        ];
        $category->fill($data);
        return $this->newsCategoryRepository->create($category);

    }

    public function update(int $newsId, int $categoryId)
    {
        $newsCategory = $this->newsCategoryRepository->findByNewsId($newsId);
        $data = [
            'category_id' => $categoryId
        ];
        $newsCategory->fill($data);
        return $this->newsCategoryRepository->update($newsCategory);
    }
}
