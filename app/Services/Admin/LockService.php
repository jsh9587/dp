<?php
namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LockService
{
    // 서비스 로직 구현
    public function index($currentUrl)
    {
        // 캐시에 해당 URL에 대한 락이 있는지 확인하고, 해당 락이 다른 사용자인지 체크
        if (Cache::has($currentUrl) && Cache::get($currentUrl) != Auth::id()) {
            // 다른 사용자가 해당 기사를 수정 중일 때
            return redirect()->route('admin.news')->with('error', '현재 해당 기사를 수정 중인 유저가 있습니다.');
        } else {
            // 현재 사용자가 해당 URL을 수정할 수 있도록 락 설정 (자기 자신은 제외)
            Cache::put($currentUrl, Auth::id(), 300); // 5분간 락 설정
        }
    }
}
