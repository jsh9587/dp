<?php

namespace App\Services\Admin\User;

use App\Interfaces\Admin\User\UserPermitRepositoryInterface;
use App\Interfaces\Admin\User\UserPermitServiceInterface;

class UserPermitService implements UserPermitServiceInterface
{
    // 서비스 로직 구현

    private UserPermitRepositoryInterface $userPermitRepository;
    public function __construct(UserPermitRepositoryInterface $userPermitRepository)
    {
        $this->userPermitRepository = $userPermitRepository;
    }

    public function findByName(string $name)
    {
        return $this->userPermitRepository->findByName($name);
    }
}
