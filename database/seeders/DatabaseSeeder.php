<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Campus;
use App\Models\SystemSetting;
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
        Appointment::factory(10)->create();


        User::factory(1)->create([
            'name' => 'administrator',
            'email' => 'administrator@medical.com',
            'role' => 'administrator',
            'password' => 'secret',
        ]);
        SystemSetting::create([
            'semester' => '2nd Semester',
            'school_year' => '2024-2025',
            'medical_start' => '2025-01-25',
            'medical_end' => '2025-02-15',
        ]);
    }
}
