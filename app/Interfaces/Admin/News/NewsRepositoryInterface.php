<?php

namespace App\Interfaces\Admin\News;

use App\Models\News\News;

interface NewsRepositoryInterface
{
    //
    public function findAll();
    public function findAllPaginate(int $paginate,array $data);
    public function create(News $news);
    public function update(News $news);
}
