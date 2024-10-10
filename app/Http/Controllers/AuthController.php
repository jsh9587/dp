<?php
namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function admin(AuthRequest $request)
    {
        // 유효성 검사 통과
        $request->validated();
        // 로그인 서비스 호출
        $bool = $this->authService->adminLogin($request->email, $request->password);
        return $bool
            ? redirect('/admin/dashboard')
            : redirect('/admin/login')->withErrors(['email' => '이메일 또는 비밀번호가 올바르지 않습니다.']);
    }

    public function adminLogout()
    {
        // 현재 사용자 세션을 초기화
        Session::flush();
        // 로그아웃 후 로그인 페이지로 리다이렉트
        return redirect('/admin/login')->with('status', '로그아웃되었습니다.');
    }
}
