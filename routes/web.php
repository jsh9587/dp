<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Middleware\AdminRouteMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', fn() => view('welcome'));

Route::get('/admin', function () {
    $userId = Session::get('user_id');
    return !$userId ? redirect('/admin/login') : redirect('/admin/dashboard');
});

Route::get('/admin/login', fn() => view('admin.login'));
Route::post('/auth/admin', [AuthController::class, 'admin'])->name('auth.admin');
Route::middleware([AdminAuthMiddleware::class,AdminRouteMiddleware::class])->group(function () {

    Route::post('/imageUpload', [ImageUploadController::class, 'index'])->name('imageUpload');


    Route::get('/admin/logout', [AuthController::class, 'adminLogout'])->name('auth.admin.logout');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user');
    Route::get('/admin/news', [NewsController::class, 'index'])->name('admin.news');
    Route::get('/admin/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/admin/news/store', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/admin/news/show/{news}', [NewsController::class, 'show'])->name('admin.news.show');
    Route::get('/admin/news/edit/{news}', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::post('/admin/news/update/{news}', [NewsController::class, 'update'])->name('admin.news.update');

    Route::post('/admin/news/getHistory',[NewsController::class, 'getHistory'])->name('admin.news.getHistory');

});


