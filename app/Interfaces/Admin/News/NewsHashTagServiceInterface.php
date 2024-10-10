<?php

namespace App\Interfaces\Admin\News;

interface NewsHashTagServiceInterface
{
    //
    public function store(int $newsId,array $data);
    public function update(int $newsId,array $data);
}
