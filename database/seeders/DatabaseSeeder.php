<?php

namespace Database\Seeders;

use App\Models\Campus;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CampusSeeder::class);
        $this->call(CollegeSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(UserSeeder::class);


        User::factory(1)->create([
            'name' => 'administrator',
            'email' => 'administrator@medical.com',
            'role' => 'administrator',
            'password' => 'secret',
        ]);
    }
}
