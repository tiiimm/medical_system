<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $appointmentCounter = 1; // Static counter to keep track of the appointment number

        return [
            'user_id' => User::where('role', 'student')->inRandomOrder()->value('id'),
            'appointment_number' => sprintf('0000-%04d', $appointmentCounter++),
            'appointment_date' => fake()->dateTimeBetween('-5 days', '+5 days')->format('Y-m-d'),
            'appointment_schedule' => fake()->randomElement(['AM', 'PM']),
            'school_year' => '2024-2025',
            'semester' => '2nd',
            'status' => 'Pending',
            'remarks' => fake()->sentence(),
            'purpose' => fake()->sentence(),
        ];
    }
}
