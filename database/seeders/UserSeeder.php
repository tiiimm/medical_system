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
        User::factory(3)->create([
            'role' => 'medical staff',
            'password' => 'secret',
        ]);
        User::factory(3)->create([
            'role' => 'drrmo staff',
            'password' => 'secret',
        ]);
        User::factory(20)->create([
            'role' => 'student',
            'password' => 'secret',
        ]);
    }
}
