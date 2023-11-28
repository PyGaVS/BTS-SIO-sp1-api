<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = ['en cours', 'à venir'];
        $beginDate = fake()->dateTimeInInterval('-1 year', '+2 year');
        $endDate = fake()->dateTimeInInterval($beginDate, '+7 days');
        return [
            'number' => fake()->randomNumber(7),
            'status' => $status[rand(0, 1)],
            'beginDate' => $beginDate,
            'endDate' => $endDate,
            'nbPassenger' => rand(0, 4)
        ];
    }
}
