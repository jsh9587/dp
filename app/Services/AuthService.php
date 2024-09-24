<?php
namespace App\Services;

use App\Interfaces\Auth\AuthRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthService
{
    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function adminLogin(string $email, string $password):bool
    {
        // 로그인 로직 호출
        $user = $this->authRepository->authenticate($email, $password);

        if( $user ){
            Session::put('user_id', $user->id);
            Session::put('user_email', $user->email);
            Session::put('user_name', $user->name);
        }

        return (bool)$user;
    }
}
