<?php

namespace App\Http\Middleware;

use App\Interfaces\Admin\User\UserServiceInterface;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminRouteMiddleware
{
    protected UserServiceInterface $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function handle(Request $request, Closure $next): Response
    {
        $userId = Auth::user()->id; // 현재 인증된 사용자의 ID 가져오기
        if ($request->is('admin/user') || $request->is('admin/user/*')) {
            if (
                !$this->userService->hasUserPermission($userId, 'MANAGE') &&
                !$this->userService->hasUserPermission($userId, 'IT') &&
                !$this->userService->hasUserPermission($userId, 'ROOT')) {
                // 세션에 알림 메시지를 추가
                session()->flash('error', '권한이 없습니다.');
                // 대시보드로 리다이렉트
                return redirect()->route('admin.dashboard'); // 대시보드의 이름으로 리다이렉트
            }
        }

        if ($request->is('admin/news') || $request->is('admin/news/*')) {
            if (
                !$this->userService->hasUserPermission($userId, 'REPORTER') &&
                !$this->userService->hasUserPermission($userId, 'IT') &&
                !$this->userService->hasUserPermission($userId, 'ROOT')
            ) {
                session()->flash('error', '권한이 없습니다.');
                return redirect()->route('admin.dashboard');
            }
        }

        return $next($request);
    }
}
