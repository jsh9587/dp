<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', fn()=>view('welcome'));

Route::get('/admin', function () {
    $userId = Session::get('user_id');
    return !$userId ? redirect('/admin/login') : redirect('/admin/dashboard');
});

Route::get('/admin/login', fn () => view('admin.login'));
Route::post('/auth/admin',[AuthController::class,'admin'])->name('auth.admin');


Route::middleware([AdminAuthMiddleware::class])->group(function () {
    Route::get('/admin/logout', fn () => app(AuthController::class)->adminLogout())->name('auth.admin.logout');
    Route::get('/admin/dashboard', fn () => app(DashboardController::class)->index())->name('admin.dashboard');
});


