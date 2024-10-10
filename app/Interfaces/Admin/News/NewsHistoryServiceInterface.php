<?php

namespace App\Interfaces\Admin\News;

interface NewsHistoryServiceInterface
{
    //
    public function store($newsId,$content);

    public function findById(int $id);
    public function findByNewsId(int $newsId);
}
