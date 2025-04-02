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
            [
                'college_id'=> 8, 'name' => 'Associate in Industrial Technology', 'abbreviation'=> 'AIT',
                'majors'=> [
                    ['name' => 'AIT:Architectural Drafting Technology', 'abbreviation' => 'AADT', 'duration_years' => 2, 'food_related' => 0],
                    ['name' => 'AIT:Automotive Technology', 'abbreviation' => 'AAT', 'duration_years' => 2, 'food_related' => 0],
                    ['name' => 'AIT:Electrical Technology', 'abbreviation' => 'AELEC', 'duration_years' => 2, 'food_related' => 0],
                    ['name' => 'AIT:Electronics Technology', 'abbreviation' => 'AELEX', 'duration_years' => 2, 'food_related' => 0],
                    ['name' => 'AIT:Food Technology', 'abbreviation' => 'AFT', 'duration_years' => 2, 'food_related' => 1],
                    ['name' => 'AIT:Garments and Textile Technology', 'abbreviation' => 'AGTT', 'duration_years' => 2, 'food_related' => 0],
                    ['name' => 'AIT:Refrigeration and Air Conditioning Technology', 'abbreviation' => 'ARAC', 'duration_years' => 2, 'food_related' => 0]
                ]
            ],
            [   'college_id'=> 8, 'name' => 'Trade Technical Education', 'abbreviation'=> 'TTE',
                'majors'=> [
                    ['name' => 'TTE:Architectural Drafting Technology', 'abbreviation' => 'TADT', 'duration_years' => 2, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 8, 'name' => 'Diploma of Technology', 'abbreviation'=> 'DT',
                'majors'=> [
                    ['name' => 'DT:Mechanical Technology', 'abbreviation' => 'DMET', 'duration_years' => 3, 'food_related' => 0],
                    ['name' => 'DT:Electrical Engineering Technology', 'abbreviation' => 'DEET', 'duration_years' => 3, 'food_related' => 0],
                    ['name' => 'DT:Electronics and Communication Technology', 'abbreviation' => 'DECT', 'duration_years' => 3, 'food_related' => 0],
                    ['name' => 'DT:Civil Engineering Technology', 'abbreviation' => 'DCET', 'duration_years' => 3, 'food_related' => 0],
                    ['name' => 'DT:Information Technology', 'abbreviation' => 'DIT', 'duration_years' => 3, 'food_related' => 0],
                    ['name' => 'DT:Garments, Fashion and Services Management Technology', 'abbreviation' => 'DGFDT', 'duration_years' => 3, 'food_related' => 0],
                    ['name' => 'DT:Food Production and Services Management Technology', 'abbreviation' => 'DFPSMT', 'duration_years' => 3, 'food_related' => 1],
                    ['name' => 'DT:Automotive Engineering Technology', 'abbreviation' => 'DAET', 'duration_years' => 3, 'food_related' => 0],
                    ['name' => 'DT:Hospitality Management Technology', 'abbreviation' => 'DHMT', 'duration_years' => 3, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 8, 'name' => 'Trade Industrial Technical Education', 'abbreviation'=> 'TITE',
                'majors'=> [
                    ['name' => 'TITE:Welding and Fabrication Technology', 'abbreviation' => 'TITE', 'duration_years' => 3, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 6, 'name' => 'Bachelor of Elementary Education', 'abbreviation'=> 'BEED',
                'majors'=> [
                    ['name' => 'Bachelor of Elementary Education', 'abbreviation' => 'BEED', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 1, 'name' => 'Bachelor of Fine Arts', 'abbreviation'=> 'BFA',
                'majors'=> [
                    ['name' => 'BFA:Industrial Design', 'abbreviation' => 'BFA-ID', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 2, 'name' => 'Bachelor of Industrial Technology', 'abbreviation'=> 'BIndTech',
                'majors'=> [
                    ['name' => 'BIndTech:BIndTech - Electrical Technology', 'abbreviation' => 'BIndTech ELT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Culinary Technology', 'abbreviation' => 'BIndTech Culinary Tech', 'duration_years' => 4, 'food_related' => 1],
                    ['name' => 'BIndTech:BIndTech - Computer Technology', 'abbreviation' => 'BIndTech CpT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Mechatronics Technology', 'abbreviation' => 'BIndTech Mecha', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Apparel and Fashion Technology', 'abbreviation' => 'BIndTech AFT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Heating, Ventilating, Air-Conditioning and Refrig', 'abbreviation' => 'BIndTech HVACRT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Electronics Technology', 'abbreviation' => 'BIndTech ELX', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Automotive Technology ', 'abbreviation' => 'BIndTech Auto', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Architectural Drafting Technology', 'abbreviation' => 'BIndTech ADT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Mechanical Technology', 'abbreviation' => 'BIndTech MT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Power Plant Technology', 'abbreviation' => 'BIndTech PPT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Construction Technology', 'abbreviation' => 'BIndTech CT', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 5, 'name' => 'Bachelor of Physical Education', 'abbreviation'=> 'BPED',
                'majors'=> [
                    ['name' => 'Bachelor of Physical Education', 'abbreviation' => 'BPED', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 2, 'name' => 'Bachelor of Science in Automotive Technology', 'abbreviation'=> 'BSAT',
                'majors'=> [
                    ['name' => 'Bachelor of Science in Automotive Technology', 'abbreviation'=> 'BSAT', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 2, 'name' => 'Bachelor of Science in Civil Engineering', 'abbreviation'=> 'BSCE',
                'majors'=> [
                    ['name' => 'Bachelor of Science in Automotive Technology', 'abbreviation'=> 'BSAT', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 2, 'name' => 'Bachelor of Science in Computer Technology', 'abbreviation'=> 'BSCpT',
                'majors'=> [
                    ['name' => 'Bachelor of Science in Computer Technology', 'abbreviation'=> 'BSCpT', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 1, 'name' => 'Bachelor of Science in Development Communication', 'abbreviation'=> 'BSDevCom',
                'majors'=> [
                    ['name' => 'Bachelor of Science in Development Communication', 'abbreviation'=> 'BSDevCom', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 2, 'name' => 'Bachelor of Science in Electrical Technology', 'abbreviation'=> 'BSET',
                'majors'=> [
                    ['name' => 'Bachelor of Science in Electrical Technology', 'abbreviation'=> 'BSET', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 2, 'name' => 'Bachelor of Science in Electronics Technology', 'abbreviation'=> 'BSElext',
                'majors'=> [
                    ['name' => 'Bachelor of Science in Electronics Technology', 'abbreviation'=> 'BSElext', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 9, 'name' => 'Bachelor of Science in Entrepreneurship', 'abbreviation'=> 'BSEntrep',
                'majors'=> [
                    ['name' => 'Bachelor of Science in Entrepreneurship', 'abbreviation'=> 'BSEntrep', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 5, 'name' => 'Bachelor of Science in Exercise and Sports Sciences', 'abbreviation'=> 'BSESS',
                'majors'=> [
                    ['name' => 'BSESS:FSC - FITNESS and SPORTS COACHING', 'abbreviation'=> 'BSESS-FSM', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BSESS:FSM - FITNESS and SPORTS MANAGEMENT', 'abbreviation'=> 'BSESS-FSC', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 9, 'name' => 'Bachelor of Science in Hospitality Management', 'abbreviation'=> 'BSHM',
                'majors'=> [
                    ['name' => 'Bachelor of Science in Hospitality Management', 'abbreviation'=> 'BSHM', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 2, 'name' => 'Bachelor of Science in Industrial Technology', 'abbreviation'=> 'BSIT',
                'majors'=> [
                    ['name' => 'BSIT:Garments and Textile Technology', 'abbreviation'=> 'BSIT-GTT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BSIT:Architectural Drafting Technology', 'abbreviation'=> 'BSIT-ADT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BSIT:Power Plant Engineering Technology', 'abbreviation'=> 'BSIT-PPE', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BSIT:Civil Technology', 'abbreviation'=> 'BSIT-CT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BSIT:Food Technology', 'abbreviation'=> 'BSIT-FT', 'duration_years' => 4, 'food_related' => 1],
                    ['name' => 'BSIT:Mechatronics Technology', 'abbreviation'=> 'BSIT-Mecha', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 3, 'name' => 'Bachelor of Science in Information Systems', 'abbreviation'=> 'BSInfoSys',
                'majors'=> [
                    ['name' => 'Bachelor of Science in Information Systems', 'abbreviation'=> 'BSInfoSys', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 3, 'name' => 'Bachelor of Science in Information Technology', 'abbreviation'=> 'BSInfoTech',
                'majors'=> [
                    ['name' => 'Bachelor of Science in Information Technology', 'abbreviation'=> 'BSInfoTech', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 4, 'name' => 'Bachelor of Science in Marine Engineering', 'abbreviation'=> 'BSMarE',
                'majors'=> [
                    ['name' => 'Bachelor of Science in Marine Engineering', 'abbreviation'=> 'BSMarE', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 2, 'name' => 'Bachelor of Science in Mechanical Technology', 'abbreviation'=> 'BSMT',
                'majors'=> [
                    ['name' => 'Bachelor of Science in Mechanical Technology', 'abbreviation'=> 'BSMT', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 2, 'name' => 'Bachelor of Science in Refrigeration and Air-Conditioning Technology', 'abbreviation'=> 'BSRACT',
                'majors'=> [
                    ['name' => 'Bachelor of Science in Refrigeration and Air-Conditioning Technology', 'abbreviation'=> 'BSRACT', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 6, 'name' => 'Bachelor of Secondary Education', 'abbreviation'=> 'BSED',
                'majors'=> [
                    ['name' => 'BSED:Mathematics', 'abbreviation'=> 'BSED-Math', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BSED:English', 'abbreviation'=> 'BSED-Eng', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 6, 'name' => 'Bachelor of Technical - Vocational Teacher Education', 'abbreviation'=> 'BTVTE',
                'majors'=> [
                    ['name' => 'BTVTED:Welding and Fabrication Technology', 'abbreviation'=> 'WAF', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BTVTED:Electrical Technology', 'abbreviation'=> 'ELECTRICAL', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BTVTED:Food & Service Management Technology', 'abbreviation'=> 'FSM', 'duration_years' => 4, 'food_related' => 1],
                    ['name' => 'BTVTED:Heating, Ventilating and Air Conditioning Technology ', 'abbreviation'=> 'HVAC', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BTVTED:Electronics Technology', 'abbreviation'=> 'ELECTRONICS', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BTVTED:Civil and Construction Technology', 'abbreviation'=> 'CCT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BTVTED:Automotive Technology', 'abbreviation'=> 'AT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BTVTED:Mechanical Technology', 'abbreviation'=> 'MT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BTVTED:Garments, Fashion and Design Technology', 'abbreviation'=> 'GFD', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BTVTED:Drafting Technology', 'abbreviation'=> 'DT', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 6, 'name' => 'Bachelor of Technology and Livelihood Education', 'abbreviation'=> 'BTLEd',
                'majors'=> [
                    ['name' => 'BTLED:Industrial Arts', 'abbreviation'=> 'BTLED - IA', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BTLED:Information and Communication Technology', 'abbreviation'=> 'BTLED - ICT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BTLED:Home Economics', 'abbreviation'=> 'BTLED - HE', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 1, 'name' => 'Batsilyer ng Sining sa Filipino', 'abbreviation'=> 'BatSiFil',
                'majors'=> [
                    ['name' => 'Batsilyer ng Sining sa Filipino', 'abbreviation'=> 'BatSiFil', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 7, 'name' => 'Bachelor of Industrial Technology', 'abbreviation'=> 'BIndTech',
                'majors'=> [
                    //vitali
                    ['name' => 'BIndTech:BIndTech - Electronics Technology', 'abbreviation' => 'BIndTech ELX', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Computer Technology', 'abbreviation' => 'BIndTech CpT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Automotive Technology ', 'abbreviation' => 'BIndTech Auto', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Electrical Technology', 'abbreviation' => 'BIndTech ELT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Culinary Technology', 'abbreviation' => 'BIndTech Culinary Tech', 'duration_years' => 4, 'food_related' => 1],
                    
                    //kabasalan
                    ['name' => 'BIndTech:BIndTech - Electrical Technology', 'abbreviation' => 'BIndTech ELT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Automotive Technology ', 'abbreviation' => 'BIndTech Auto', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Mechanical Technology', 'abbreviation' => 'BIndTech MT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Culinary Technology', 'abbreviation' => 'BIndTech Culinary Tech', 'duration_years' => 4, 'food_related' => 1],
                    ['name' => 'BIndTech:BIndTech - Construction Technology', 'abbreviation' => 'BIndTech CT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Apparel and Fashion Technology', 'abbreviation' => 'BIndTech AFT', 'duration_years' => 4, 'food_related' => 0],
                    
                    //malangas
                    ['name' => 'BIndTech:BIndTech - Computer Technology', 'abbreviation' => 'BIndTech CpT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Electrical Technology', 'abbreviation' => 'BIndTech ELT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Electronics Technology', 'abbreviation' => 'BIndTech ELX', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BIndTech:BIndTech - Culinary Technology', 'abbreviation' => 'BIndTech Culinary Tech', 'duration_years' => 4, 'food_related' => 1],

                    // 'name' => 'BIndTech:BIndTech - Mechatronics Technology', 'abbreviation' => 'BIndTech Mecha', 'duration_years' => 4, 'food_related' => 0],
                    // 'name' => 'BIndTech:BIndTech - Heating, Ventilating, Air-Conditioning and Refrig', 'abbreviation' => 'BIndTech HVACRT', 'duration_years' => 4, 'food_related' => 0],
                    // 'name' => 'BIndTech:BIndTech - Architectural Drafting Technology', 'abbreviation' => 'BIndTech ADT', 'duration_years' => 4, 'food_related' => 0],
                    // 'name' => 'BIndTech:BIndTech - Power Plant Technology', 'abbreviation' => 'BIndTech PPT', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 7, 'name' => 'Bachelor of Science in Electrical Technology', 'abbreviation'=> 'BSET',
                'majors'=> [
                    //vitali, kabasalan
                    ['name' => 'Bachelor of Science in Electrical Technology', 'abbreviation'=> 'BSET', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 7, 'name' => 'Bachelor of Science in Computer Technology', 'abbreviation'=> 'BSCpT',
                'majors'=> [
                    //vitali
                    ['name' => 'Bachelor of Science in Computer Technology', 'abbreviation'=> 'BSCpT', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 7, 'name' => 'Bachelor of Physical Education', 'abbreviation'=> 'BPED',
                'majors'=> [
                    //vitali
                    ['name' => 'Bachelor of Physical Education', 'abbreviation' => 'BPED', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 7, 'name' => 'Bachelor of Science in Automotive Technology', 'abbreviation'=> 'BSAT',
                'majors'=> [
                    //vitali, kabasalan
                    ['name' => 'Bachelor of Science in Automotive Technology', 'abbreviation'=> 'BSAT', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 7, 'name' => 'Bachelor of Technology and Livelihood Education', 'abbreviation'=> 'BTLEd',
                'majors'=> [
                    //vitali
                    ['name' => 'BTLED:Home Economics', 'abbreviation'=> 'BTLED - HE', 'duration_years' => 4, 'food_related' => 0],
                    
                    // 'name' => 'BTLED:Industrial Arts', 'abbreviation'=> 'BTLED - IA', 'duration_years' => 4, 'food_related' => 0],
                    // 'name' => 'BTLED:Information and Communication Technology', 'abbreviation'=> 'BTLED - ICT', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 7, 'name' => 'Bachelor of Elementary Education', 'abbreviation'=> 'BEED',
                'majors'=> [
                    //vitali
                    ['name' => 'Bachelor of Elementary Education', 'abbreviation' => 'BEED', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 7, 'name' => 'Bachelor of Science in Mechanical Technology', 'abbreviation'=> 'BSMT',
                'majors'=> [
                    //kabasalan
                    ['name' => 'Bachelor of Science in Mechanical Technology', 'abbreviation'=> 'BSMT', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 7, 'name' => 'Bachelor of Technical - Vocational Teacher Education', 'abbreviation'=> 'BTVTE',
                'majors'=> [
                    //kabasalan
                    ['name' => 'BTVTED:Electrical Technology', 'abbreviation'=> 'ELECTRICAL', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BTVTED:Food & Service Management Technology', 'abbreviation'=> 'FSM', 'duration_years' => 4, 'food_related' => 1],
                    ['name' => 'BTVTED:Mechanical Technology', 'abbreviation'=> 'MT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BTVTED:Garments, Fashion and Design Technology', 'abbreviation'=> 'GFD', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BTVTED:Automotive Technology', 'abbreviation'=> 'AT', 'duration_years' => 4, 'food_related' => 0],

                    // 'name' => 'BTVTED:Welding and Fabrication Technology', 'abbreviation'=> 'WAF', 'duration_years' => 4, 'food_related' => 0],
                    // 'name' => 'BTVTED:Heating, Ventilating and Air Conditioning Technology ', 'abbreviation'=> 'HVAC', 'duration_years' => 4, 'food_related' => 0],
                    // 'name' => 'BTVTED:Electronics Technology', 'abbreviation'=> 'ELECTRONICS', 'duration_years' => 4, 'food_related' => 0],
                    // 'name' => 'BTVTED:Civil and Construction Technology', 'abbreviation'=> 'CCT', 'duration_years' => 4, 'food_related' => 0],
                    // 'name' => 'BTVTED:Drafting Technology', 'abbreviation'=> 'DT', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 7, 'name' => 'Bachelor of Science in Industrial Technology', 'abbreviation'=> 'BSIT',
                'majors'=> [
                    //kabasalan
                    ['name' => 'BSIT:Civil Technology', 'abbreviation'=> 'BSIT-CT', 'duration_years' => 4, 'food_related' => 0],
                    ['name' => 'BSIT:Food Technology', 'abbreviation'=> 'BSIT-FT', 'duration_years' => 4, 'food_related' => 1],
                    ['name' => 'BSIT:Garments and Textile Technology', 'abbreviation'=> 'BSIT-GTT', 'duration_years' => 4, 'food_related' => 0],

                    // 'name' => 'BSIT:Architectural Drafting Technology', 'abbreviation'=> 'BSIT-ADT', 'duration_years' => 4, 'food_related' => 0],
                    // 'name' => 'BSIT:Power Plant Engineering Technology', 'abbreviation'=> 'BSIT-PPE', 'duration_years' => 4, 'food_related' => 0],
                    // 'name' => 'BSIT:Mechatronics Technology', 'abbreviation'=> 'BSIT-Mecha', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 7, 'name' => 'Bachelor of Science in Hospitality Management', 'abbreviation'=> 'BSHM',
                'majors'=> [
                    //malangas
                    ['name' => 'Bachelor of Science in Hospitality Management', 'abbreviation'=> 'BSHM', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
            [
                'college_id'=> 7, 'name' => 'Bachelor of Science in Entrepreneurship', 'abbreviation'=> 'BSEntrep',
                'majors'=> [
                    //malangas
                    ['name' => 'Bachelor of Science in Entrepreneurship', 'abbreviation'=> 'BSEntrep', 'duration_years' => 4, 'food_related' => 0],
                ]
            ],
        ];
        

        foreach ($programs as $program) {
            $majors = $program['majors'] ?? [];
            unset($program['majors']);
            $newProgram = Program::create($program);
            foreach ($majors as $major) {
                $newProgram->majors()->create($major);
            }
        }
    }
}
