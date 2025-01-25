<?php

namespace Database\Factories;

use App\Models\EmergencyContact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalProfile>
 */
class MedicalProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'birthdate'=>fake()->dateTimeBetween('-30 years', '-15 years')->format('Y-m-d'),
            'sex'=>fake()->randomElement(['Male', 'Female']),
            'blood_type'=>fake()->randomElement(['A', 'B', 'AB', 'O', 'A-', 'B-', 'AB-', 'O-']),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($medical_profile) {
            EmergencyContact::factory()->create([
                'medical_profile_id' => $medical_profile->id,
            ]);
        });
    }
}
