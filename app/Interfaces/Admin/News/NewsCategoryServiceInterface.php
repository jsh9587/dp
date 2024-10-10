<?php

namespace App\Interfaces\Admin\News;

interface NewsCategoryServiceInterface
{
    //
    public function findAll();

    public function store(int $newsId, int $categoryId);

    public function update(int $newsId, int $categoryId);
}
