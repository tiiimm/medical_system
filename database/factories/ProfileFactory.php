<?php

namespace Database\Factories;

use App\Models\MedicalProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'extension_name' => fake()->randomElement(['Jr.', 'Sr.', 'III', '']),
            'contact_number' => '09611875658',
            'civil_status' => 'Single',
            'address' => fake()->address(),
            'profile_photo_path' => null, // Can be a URL or file path
            'zppsu_number' => fake()->unique()->numerify('202#-#####'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($profile) {
            if ($profile->user->role == 'student') {
                MedicalProfile::factory()->create([
                    'profile_id' => $profile->id,
                ]);
            }
        });
    }
}
