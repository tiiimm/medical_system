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
        //3 if testing
        for ($i = 1; $i <= 1; $i++) {
            User::factory()->create([
                'email' => "medical{$i}@medical.com",
                'role' => 'medical staff',
                'password' => bcrypt('password'),
            ]);
        }
        //3 if testing
        for ($i = 1; $i <= 1; $i++) {
            User::factory()->create([
                'email' => "drrmo{$i}@medical.com",
                'role' => 'drrmo staff',
                'password' => bcrypt('password'),
            ]);
        }
        //allow if testing
        for ($i = 1; $i <= 2; $i++) {
            User::factory()->create([
                'email' => "student{$i}@medical.com",
                'role' => 'student',
                'password' => bcrypt('password'),
            ]);
        }
        // User::factory(15)->create([
        //     'role' => 'student',
        //     'password' => bcrypt('password'),
        // ]);
    }
}
