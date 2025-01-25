<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Appointment;
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
        // Get today's date in Y-m-d format
        $todayDate = now()->format('Y-m-d');

        // Get the count of appointments for today
        $appointmentCount = Appointment::whereDate('appointment_date', $todayDate)->count();

        // Increment the counter based on the existing count of appointments for today
        $appointmentNumber = sprintf('#%04d', $appointmentCount + 1);

        return [
            'user_id' => User::where('role', 'student')->inRandomOrder()->value('id'),
            'appointment_number' => $appointmentNumber, // Dynamic number based on the date
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
