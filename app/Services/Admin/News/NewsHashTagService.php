<?php

namespace App\Services\Admin\News;

use App\Interfaces\Admin\News\NewsHashTagRepositoryInterface;
use App\Interfaces\Admin\News\NewsHashTagServiceInterface;
use App\Models\News\NewsHashTag;
use Illuminate\Support\Facades\Log;

class NewsHashTagService implements NewsHashTagServiceInterface
{
    // 서비스 로직 구현
    private NewsHashTagRepositoryInterface $newsHashTagRepository;

    public function __construct(NewsHashTagRepositoryInterface $newsHashTagRepository)
    {
        $this->newsHashTagRepository = $newsHashTagRepository;
    }

    public function store(int $newsId, array $data)
    {
        if (isset($data['hash_tag']) && is_array($data['hash_tag'])) {
            foreach ($data['hash_tag'] as $tag) {
                $hashTag = new NewsHashTag();

                $hashTag->fill([
                    'news_id' => $newsId,
                    'hash_tag' => $tag
                ]);

                // Log the hashTag data before saving
                Log::info('Saving NewsHashTag', $hashTag->toArray());

                // Save the hash tag using the repository
                $this->newsHashTagRepository->create($hashTag);
            }
        }
    }

    public function update(int $newsId, array $data)
    {
        $newsHashTags = $this->newsHashTagRepository->findByNewsId($newsId);
        if ($newsHashTags) {
            foreach ($newsHashTags as $tag) {
                $this->newsHashTagRepository->delete($tag);
            }
        }
        if (isset($data['hash_tag']) && is_array($data['hash_tag'])) {
            foreach ($data['hash_tag'] as $tag) {
                $hashTag = new NewsHashTag();
                $hashTag->fill([
                    'news_id' => $newsId,
                    'hash_tag' => $tag
                ]);
                $this->newsHashTagRepository->create($hashTag);
            }
        }

    }
}
