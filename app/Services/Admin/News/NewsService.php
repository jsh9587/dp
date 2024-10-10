<?php
namespace App\Services\Admin\News;

use App\Interfaces\Admin\News\NewsRepositoryInterface;
use App\Interfaces\Admin\News\NewsServiceInterface;
use App\Models\News\News;

class NewsService implements NewsServiceInterface
{
    // NewsRepositoryInterface 의존성 주입
    private NewsRepositoryInterface $newsRepository;

    // 생성자에서 의존성 주입
    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function findAll()
    {
        return $this->newsRepository->findAll();
    }

    public function findAllPaginate(int $paginate,$data)
    {
        return $this->newsRepository->findAllPaginate($paginate,$data);
    }

    public function store(array $data)
    {
        // News 모델 인스턴스 생성 및 데이터 채우기
        $news = new News();
        $news->fill($data);
        // 레퍼지토리를 통해 데이터 저장
        $insertedNews = $this->newsRepository->create($news);

        return $insertedNews->id;
    }

    public function update(News $news, array $data)
    {
        // Update the news item using the provided data
        $news->fill($data);
        $updatedNews = $this->newsRepository->update($news);
        return $updatedNews->id;
    }
}
