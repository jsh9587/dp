<?php

namespace App\Repositories\Admin\News;
use App\Interfaces\Admin\News\NewsRepositoryInterface;
use App\Models\News\News;

class NewsRepository implements NewsRepositoryInterface
{
    public function findAll()
    {
        return News::all();
    }

    public function findAllPaginate(int $paginate, array $data)
    {
        return News::when($data['author_id'] ?? null, function($query) use ($data) {
            // author_id가 주어졌을 때 조건 추가
            return $query->where('author_id', $data['author_id']);
        })
            ->orderBy('created_at', 'desc')  // created_at 필드 기준으로 내림차순 정렬
            ->paginate($paginate);  // 페이지네이션 적용
    }

    public function create(News $news)
    {
        if( $news->save() )
        {
            return $news;
        }
        return null;
    }

    public function update(News $news)
    {
        if( $news->save() )
        {
            return $news;
        }
        return null;
    }
}
