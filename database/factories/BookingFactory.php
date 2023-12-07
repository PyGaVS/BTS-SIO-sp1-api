<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
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
        $status = ['en cours', 'à venir', 'terminée'];
        $beginDate = fake()->dateTimeInInterval('-1 year', '+2 year');
        $endDate = fake()->dateTimeInInterval($beginDate, '+7 days');
        $customers = User::where('user_type_id', '=', 1)->get();
        $cars = Car::all();
        $car_id = rand(1, count($cars)-1);
        $car = $cars->find($car_id);
        return [
            'number' => fake()->randomNumber(7),
            'status' => $status[rand(0, 2)],
            'beginDate' => $beginDate,
            'endDate' => $endDate,
            'nbPassenger' => rand(0, 4),

            'car_id' => $car_id,
            'car_model_id' => $car->carModel->id,
            'startAgency' => rand(1, 3),
            'endAgency' => rand(1, 3),
            'customer' => rand(1, count($customers)-1)
        ];
    }
}
