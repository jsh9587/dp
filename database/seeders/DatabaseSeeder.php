<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $hashed_password = Hash::make('1234');
        User::create([
            'name' => '정승훈',
            'email' => 'jsh9587@dailypharm.com',
            'password' => $hashed_password,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::factory(30)->create();
    }
}
