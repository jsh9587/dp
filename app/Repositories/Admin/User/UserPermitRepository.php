<?php

namespace App\Repositories\Admin\User;

use App\Interfaces\Admin\User\UserPermitRepositoryInterface;
use App\Models\User;
use App\Models\UserPermit;

class UserPermitRepository implements UserPermitRepositoryInterface
{
    // 서비스 로직 구현
    public function findByName(string $name)
    {
        return User::whereHas('permits', function ($query) {
            $query->where('name', 'REPORTER');
        })->get();
    }
}
