<?php

namespace App\Interfaces\Admin\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    // 특정 ID로 사용자 조회
    public function findById(int $id): ?User;
    public function findAll(): Collection;
}
