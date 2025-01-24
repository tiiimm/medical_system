<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            ['college_id'=> 8, 'name'=> 'Associate in Industrial Technology', 'abbreviation'=> 'AIT', 'duration_years'=> 2],
            ['college_id'=> 6, 'name'=> 'Bachelor of Elementary Education', 'abbreviation'=> 'BEED', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Elementary Education', 'abbreviation'=> 'BEED', 'duration_years'=> 4],
            ['college_id'=> 1, 'name'=> 'Bachelor of Fine Arts', 'abbreviation'=> 'BFA', 'duration_years'=> 4],
            ['college_id'=> 2, 'name'=> 'Bachelor of Industrial Technology', 'abbreviation'=> 'BIndTech', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Industrial Technology', 'abbreviation'=> 'BIndTech', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Industrial Technology', 'abbreviation'=> 'BIndTech', 'duration_years'=> 4],
            ['college_id'=> 5, 'name'=> 'Bachelor of Physical Education', 'abbreviation'=> 'BPED', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Physical Education', 'abbreviation'=> 'BPED', 'duration_years'=> 4],
            ['college_id'=> 2, 'name'=> 'Bachelor of Science in Automotive Technology', 'abbreviation'=> 'BSAT', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Science in Automotive Technology', 'abbreviation'=> 'BSAT', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Science in Automotive Technology', 'abbreviation'=> 'BSAT', 'duration_years'=> 4],
            ['college_id'=> 2, 'name'=> 'Bachelor of Science in Civil Engineering', 'abbreviation'=> 'BSCE', 'duration_years'=> 4],
            ['college_id'=> 2, 'name'=> 'Bachelor of Science in Computer Technology', 'abbreviation'=> 'BSCompTech', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Science in Computer Technology', 'abbreviation'=> 'BSCompTech', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Science in Computer Technology', 'abbreviation'=> 'BSCompTech', 'duration_years'=> 4],
            ['college_id'=> 1, 'name'=> 'Bachelor of Science in Development Communication', 'abbreviation'=> 'BSDevCom', 'duration_years'=> 4],
            ['college_id'=> 2, 'name'=> 'Bachelor of Science in Electrical Technology', 'abbreviation'=> 'BSET', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Science in Electrical Technology', 'abbreviation'=> 'BSET', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Science in Electrical Technology', 'abbreviation'=> 'BSET', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Science in Electrical Technology', 'abbreviation'=> 'BSET', 'duration_years'=> 4],
            ['college_id'=> 2, 'name'=> 'Bachelor of Science in Electronics Technology', 'abbreviation'=> 'BSElext', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Science in Entrepreneurship', 'abbreviation'=> 'BSEntrep', 'duration_years'=> 4],
            ['college_id'=> 9, 'name'=> 'Bachelor of Science in Entrepreneurship', 'abbreviation'=> 'BSEntrep', 'duration_years'=> 4],
            ['college_id'=> 5, 'name'=> 'Bachelor of Science in Exercise and Sports Sciences', 'abbreviation'=> 'BSESS', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Science in Hospitality Management', 'abbreviation'=> 'BSHM', 'duration_years'=> 4],
            ['college_id'=> 9, 'name'=> 'Bachelor of Science in Hospitality Management', 'abbreviation'=> 'BSHM', 'duration_years'=> 4],
            ['college_id'=> 2, 'name'=> 'Bachelor of Science in Industrial Technology', 'abbreviation'=> 'BSIT', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Science in Industrial Technology', 'abbreviation'=> 'BSIT', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Science in Industrial Technology', 'abbreviation'=> 'BSIT', 'duration_years'=> 4],
            ['college_id'=> 3, 'name'=> 'Bachelor of Science in Information Systems', 'abbreviation'=> 'BSInfoSys', 'duration_years'=> 4],
            ['college_id'=> 3, 'name'=> 'Bachelor of Science in Information Technology', 'abbreviation'=> 'BSInfoTech', 'duration_years'=> 4],
            ['college_id'=> 4, 'name'=> 'Bachelor of Science in Marine Engineering', 'abbreviation'=> 'BSMarE', 'duration_years'=> 4],
            ['college_id'=> 2, 'name'=> 'Bachelor of Science in Mechanical Technology', 'abbreviation'=> 'BSMT', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Science in Mechanical Technology', 'abbreviation'=> 'BSMT', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Science in Mechanical Technology', 'abbreviation'=> 'BSMT', 'duration_years'=> 4],
            ['college_id'=> 2, 'name'=> 'Bachelor of Science in Refrigeration and Air-Conditioning Technology', 'abbreviation'=> 'BSRACT', 'duration_years'=> 4],
            ['college_id'=> 6, 'name'=> 'Bachelor of Secondary Education', 'abbreviation'=> 'BSEd', 'duration_years'=> 4],
            ['college_id'=> 6, 'name'=> 'Bachelor of Technical - Vocational Teacher Education', 'abbreviation'=> 'BTVTE', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Technical - Vocational Teacher Education', 'abbreviation'=> 'BTVTE', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Technical - Vocational Teacher Education', 'abbreviation'=> 'BTVTE', 'duration_years'=> 4],
            ['college_id'=> 6, 'name'=> 'Bachelor of Technology and Livelihood Education', 'abbreviation'=> 'BTLEd', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Technology and Livelihood Education', 'abbreviation'=> 'BTLEd', 'duration_years'=> 4],
            ['college_id'=> 7, 'name'=> 'Bachelor of Technology and Livelihood Education', 'abbreviation'=> 'BTLEd', 'duration_years'=> 4],
            ['college_id'=> 1, 'name'=> 'Batsilyer ng Sining sa Filipino', 'abbreviation'=> 'BatSiFil', 'duration_years'=> 4],
            ['college_id'=> 8, 'name'=> 'Diploma of Technology', 'abbreviation'=> 'DT', 'duration_years'=> 3],
            ['college_id'=> 8, 'name'=> 'Trade Industrial Technical Education', 'abbreviation'=> 'TITE', 'duration_years'=> 3],
            ['college_id'=> 8, 'name'=> 'Trade Technical Education', 'abbreviation'=> 'TTE', 'duration_years'=> 2],
        ];
        

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
