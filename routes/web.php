<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    // 세션에서 user_id를 가져옴
    $userId = Session::get('user_id');
    // 세션이 없으면 로그인 페이지로 리다이렉트
    if (!$userId) {
        return redirect('/admin/login');
    }
    // 세션이 존재하면 관리자 페이지 로드
    return redirect('/admin/dashboard');
});


Route::get('/admin/login',function (){
   return view('admin.login');
});
Route::post('/auth/admin',[AuthController::class,'admin'])->name('auth.admin');



Route::middleware([AdminAuthMiddleware::class])->group(function () {
    Route::get('/admin/logout',[AuthController::class,'adminLogout'])->name('auth.admin.logout');
    Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard')->name("admin.dashboard");
});



