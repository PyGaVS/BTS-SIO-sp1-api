<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        // Generate license plate
        $licensePlate = $letters[rand(0, strlen($letters))-1]
            .$letters[rand(0, strlen($letters))-1]
            .'-'
            .fake()->unique()->bothify('###')
            .'-'
            .$letters[rand(0, strlen($letters))-1]
            .$letters[rand(0, strlen($letters))-1];
        $status = array(
            'Réparation',
            'Opérationnelle',
            'Nettoyage',
            'Controle technique',
            'Autre exemple'
        );

        return [
            'licensePlate' => $licensePlate,
            'status' => $status[rand(0, 4)],
            'isClean' => rand(0, 1),
            'mileage' => rand(0, 500000)
        ];
    }
}
