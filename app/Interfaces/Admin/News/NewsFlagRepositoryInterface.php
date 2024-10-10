<?php

namespace App\Interfaces\Admin\News;

interface NewsFlagRepositoryInterface
{
    //
    public function findByType(int $type);
}
