<?php

namespace Database\Seeders;

use App\Models\Permit;
use App\Models\User;
use App\Models\UserPermit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            ['email' => 'drd7321@dailypharm.com', 'name' => '이정석', 'permit' => ['ROOT']],
            ['email' => 'ojh001@dailypharm.com', 'name' => '오진희', 'permit' => ['AUDITOR']],
            ['email' => 'mimipapa@dailypharm.com', 'name' => '김민혁', 'permit' => ['DIRECTOR', 'MANAGE']],
            ['email' => 'hjjung@dailypharm.com', 'name' => '정혜정', 'permit' => ['TEAM_LEADER', 'MANAGE']],
            ['email' => 'onewayj1@dailypharm.com', 'name' => '한진주', 'permit' => ['USER', 'MANAGE']],
            ['email' => 'kjh@dailypharm.com', 'name' => '강주희', 'permit' => ['USER', 'MANAGE']],
            ['email' => 'dohee@dailypharm.com', 'name' => '오도희', 'permit' => ['USER', 'MANAGE']],
            ['email' => 'yjahn@dailypharm.com', 'name' => '안유진', 'permit' => ['USER', 'MANAGE_MARKETING']],
            ['email' => 'ehdus1745@dailypharm.com', 'name' => '김도연', 'permit' => ['USER', 'MANAGE_MARKETING']],
            ['email' => 'ksy1106@dailypharm.com', 'name' => '권성용', 'permit' => ['TEAM_LEADER', 'IT']],
            ['email' => 'deadu21@dailypharm.com', 'name' => '권세영', 'permit' => ['USER', 'IT']],
            ['email' => 'jyj@dailypharm.com', 'name' => '정윤지', 'permit' => ['USER', 'IT']],
            ['email' => 'ssy@dailypharm.com', 'name' => '서승연', 'permit' => ['USER', 'IT']],
            ['email' => 'aram@dailypharm.com', 'name' => '최아람', 'permit' => ['USER', 'IT']],
            ['email' => 'kraken@dailypharm.com', 'name' => '윤진혁', 'permit' => ['USER', 'IT']],
            ['email' => 'mke@dailypharm.com', 'name' => '문경은', 'permit' => ['USER', 'IT']],
            ['email' => 'jsh9587@dailypharm.com', 'name' => '정승훈', 'permit' => ['USER', 'IT']],
            ['email' => 'sjy4666@dailypharm.com', 'name' => '성진영', 'permit' => ['USER', 'IT']],
            ['email' => 'pjh@dailypharm.com', 'name' => '박지호', 'permit' => ['USER', 'RECRUIT']],
            ['email' => 'leejj@dailypharm.com', 'name' => '가인호', 'permit' => ['DIRECTOR', 'REPORTER']],
            ['email' => 'ksk@dailypharm.com', 'name' => '강신국', 'permit' => ['TEAM_LEADER', 'REPORTER']],
            ['email' => 'bob83@dailypharm.com', 'name' => '김지은', 'permit' => ['USER', 'REPORTER']],
            ['email' => 'khk@dailypharm.com', 'name' => '강혜경', 'permit' => ['USER', 'REPORTER']],
            ['email' => 'jhj@dailypharm.com', 'name' => '정흥준', 'permit' => ['USER', 'REPORTER']],
            ['email' => 'hooggasi2@dailypharm.com', 'name' => '이탁순', 'permit' => ['TEAM_LEADER', 'REPORTER']],
            ['email' => 'hgrace7@dailypharm.com', 'name' => '이혜경', 'permit' => ['USER', 'REPORTER']],
            ['email' => 'junghwanss@dailypharm.com', 'name' => '이정환', 'permit' => ['USER', 'REPORTER']],
            ['email' => 'sasiman@dailypharm.com', 'name' => '노병철', 'permit' => ['TEAM_LEADER', 'REPORTER']],
            ['email' => 'unkindfish@dailypharm.com', 'name' => '어윤호', 'permit' => ['USER', 'REPORTER']],
            ['email' => 'wiviwivi@dailypharm.com', 'name' => '이석준', 'permit' => ['USER', 'REPORTER']],
            ['email' => '1000@dailypharm.com', 'name' => '천승현', 'permit' => ['TEAM_LEADER', 'REPORTER']],
            ['email' => 'kjg@dailypharm.com', 'name' => '김진구', 'permit' => ['USER', 'REPORTER']],
            ['email' => 'shm@dailypharm.com', 'name' => '손형민', 'permit' => ['USER', 'REPORTER']],
            ['email' => 'lhs@dailypharm.com', 'name' => '이현수', 'permit' => ['USER', 'MARKETING']],
            ['email' => 'pje@dailypharm.com', 'name' => '박지은', 'permit' => ['USER', 'MARKETING']],
            ['email' => 'ahj@dailypharm.com', 'name' => '안현정', 'permit' => ['DIRECTOR', 'MARKETING']],
            ['email' => 'jdh@dailypharm.com', 'name' => '주다희', 'permit' => ['TEAM_LEADER', 'MARKETING']],
            ['email' => 'jmjm@dailypharm.com', 'name' => '이준명', 'permit' => ['USER', 'MARKETING']],
            ['email' => 'keh@dailypharm.com', 'name' => '김언희', 'permit' => ['USER', 'MARKETING']],
            ['email' => 'syk@dailypharm.com', 'name' => '성유경', 'permit' => ['USER', 'MARKETING']],
            ['email' => 'lkm@dailypharm.com', 'name' => '이경민', 'permit' => ['USER', 'MARKETING']],
            ['email' => 'jhh@dailypharm.com', 'name' => '정현희', 'permit' => ['USER', 'MARKETING']],
            ['email' => 'ljs08@dailypharm.com', 'name' => '이지선', 'permit' => ['USER', 'MARKETING']]
        ];

        $hashed_password = Hash::make('1234');
        foreach ($users as $user) {
            $insertUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $hashed_password,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);

            if (isset($user['permit']) && is_array($user['permit'])) {
                foreach ($user['permit'] as $permitName) {
                    // Get the permit by its name
                    //Log::info($user['email'].":".$permitName);
                    $permit = Permit::where('name', $permitName)->first();
                    if ($permit) { // Check if the permit exists
                        UserPermit::create([
                            'user_id' => $insertUser->id,
                            'permit_id' => $permit->id
                        ]);
                    }
                }
            }
        }
    }
}
