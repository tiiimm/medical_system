<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            User::factory()->create([
                'email' => "medical{$i}@medical.com",
                'role' => 'medical staff',
                'password' => bcrypt('secret'),
            ]);
        }
        for ($i = 1; $i <= 3; $i++) {
            User::factory()->create([
                'email' => "drrmo{$i}@medical.com",
                'role' => 'drrmo staff',
                'password' => bcrypt('secret'),
            ]);
        }
        for ($i = 1; $i <= 5; $i++) {
            User::factory()->create([
                'email' => "student{$i}@medical.com",
                'role' => 'student',
                'password' => bcrypt('secret'),
            ]);
        }
        User::factory(15)->create([
            'role' => 'student',
            'password' => bcrypt('secret'),
        ]);
    }
}
