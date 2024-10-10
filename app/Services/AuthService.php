<?php
namespace App\Services;

use App\Interfaces\Auth\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthService
{
    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function adminLogin(string $email, string $password): bool
    {
        // 로그인 로직 호출 (사용자를 인증)
        $user = $this->authRepository->authenticate($email, $password);

        if ($user) {
            // Auth::login()으로 세션에 로그인 정보 저장
            Auth::login($user);  // $user는 Eloquent 모델이어야 함
            return true;
        }

        return false;
    }
}
