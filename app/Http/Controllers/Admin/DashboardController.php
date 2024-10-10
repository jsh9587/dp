<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();  // 현재 로그인한 사용자 객체 (User 모델)
        if ($user) {
            return view('admin.dashboard.index', compact('user'));
        }
    }
}
