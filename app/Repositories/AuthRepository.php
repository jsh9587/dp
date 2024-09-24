<?php

namespace App\Repositories;

use App\Interfaces\Auth\AuthRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// User 모델 임포트

class AuthRepository implements AuthRepositoryInterface
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function authenticate(string $email, string $password): ?User
    {
        // 이메일로 사용자 찾기
        $user = $this->user->where('email', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }
        return null;
    }
}
