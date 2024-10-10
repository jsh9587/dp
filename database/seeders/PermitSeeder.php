<?php

namespace Database\Seeders;

use App\Models\Permit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permits = [
            'ROOT',
            'AUDITOR',
            'DIRECTOR',
            'MANAGE',
            'TEAM_LEADER',
            'USER',
            'MANAGE_MARKETING',
            'IT',
            'RECRUIT',
            'REPORTER',
            'MARKETING'
        ];

        foreach ($permits as $permit) {
            Permit::create([
                'name' => $permit, // Ensure you are providing the name
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
