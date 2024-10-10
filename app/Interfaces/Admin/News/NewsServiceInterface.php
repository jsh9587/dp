<?php

namespace App\Interfaces\Admin\News;

use App\Models\News\News;

interface NewsServiceInterface
{
    //
    public function findAll();

    public function findAllPaginate(int $paginate,array $data);

    public function store(array $data);

    public function update(News $news, array $data);
}
