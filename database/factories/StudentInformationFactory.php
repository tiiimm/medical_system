<?php

namespace Database\Factories;

use App\Models\Campus;
use App\Models\Major;
use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'campus_id' => Campus::query()->inRandomOrder()->value('id'),
            'program_id' => Program::query()->inRandomOrder()->value('id'),
            'major_id' => Major::query()->inRandomOrder()->value('id'),
            'year_level' => fake()->randomElement(['1st Year', '2nd Year', '3rd Year', '4th Year']),
            'status' => fake()->randomElement(['Regular', 'Irregular']),
        ];
    }
}
