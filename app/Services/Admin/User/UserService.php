<?php

namespace App\Services\Admin;

use App\Interfaces\Admin\UserRepositoryInterface;
use App\Interfaces\Admin\UserServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class UserService implements UserServiceInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function hasUserPermission(int $userId, string $permission): bool
    {
        $user = $this->userRepository->findById($userId);
        // 사용자가 존재할 경우 권한을 확인
        return $user ? $user->permits->contains('name', $permission) : false;
    }

    public function users(): Collection
    {
        return $this->userRepository->findAll();
    }
}
