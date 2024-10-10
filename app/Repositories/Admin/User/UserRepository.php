<?php

namespace App\Repositories\Admin\User;

use App\Interfaces\Admin\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;


class UserRepository implements UserRepositoryInterface
{
    public function findById(int $id): ?User
    {
        return User::find($id); // 특정 ID의 사용자를 찾아 반환
    }

    public function findAll(): Collection
    {
        return User::all();
    }
}
