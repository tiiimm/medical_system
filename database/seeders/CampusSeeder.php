<?php

namespace Database\Seeders;

use App\Models\Campus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Campus::create([
            'name' => 'Main Campus',
            'address' => 'Baliwasan Chico'
        ]);
        Campus::create([
            'name' => 'Siay Campus',
            'address' => 'Siay'
        ]);
        Campus::create([
            'name' => 'Kabasalan Campus',
            'address' => 'Kabasalan'
        ]);
        Campus::create([
            'name' => 'Malangas Campus',
            'address' => 'Malangas'
        ]);
        Campus::create([
            'name' => 'Vitali Campus',
            'address' => 'Vitali'
        ]);
    }
}
