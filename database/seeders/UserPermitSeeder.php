<?php

namespace Database\Seeders;

use App\Models\Permit;
use App\Models\User;
use App\Models\UserPermit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPermitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 데이터베이스에 사용자와 허가의 조합을 생성합니다.
        // 예를 들어, 각 사용자에게 1개 이상의 허가를 부여합니다.

        // 모든 사용자 가져오기
        $users = User::all();
        // 모든 허가 가져오기
        $permits = Permit::all();

        foreach ($users as $user) {
            // 각 사용자에게 랜덤으로 허가를 할당합니다.
            if( $user->email == 'jsh9587@dailypharm.com' ){
                UserPermit::create([
                    'user_id' => $user->id,
                    'permit_id' => 1,
                ]);
                UserPermit::create([
                    'user_id' => $user->id,
                    'permit_id' => 6,
                ]);
            }else{
                $randomPermits = $permits->random(rand(1, 2)); // 1에서 3개까지 랜덤으로 선택
                foreach ($randomPermits as $permit) {
                    // UserPermit에 새 레코드 생성
                    UserPermit::create([
                        'user_id' => $user->id,
                        'permit_id' => $permit->id,
                    ]);
                }
            }

        }
    }
}
