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
    public function licensePlateMaker() : string
    {
        // Function that generates a license plate in French format
        $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

        $licensePlate = $letters[rand(0, strlen($letters))-1]
            .$letters[rand(0, strlen($letters))-1]
            .'-'
            .fake()->unique()->bothify('###')
            .'-'
            .$letters[rand(0, strlen($letters))-1]
            .$letters[rand(0, strlen($letters))-1];

        return $licensePlate;
    }

    private function statusPicker() : string
    {
        // Function that picks a random status in a list
        $status = array(
            'Réparation',
            'Opérationnelle',
            'Opérationnelle',
            'Nettoyage',
            'Controle technique',
        );
        return $status[rand(0, count($status) -1)];
    }
    public function definition(): array
    {
        return [
            'licensePlate' => $this->licensePlateMaker(),
            'status' => $this->statusPicker(),
            'isClean' => rand(0, 1),
            'mileage' => rand(0, 500000),
            'car_model_id' => rand(1, 29)
        ];

    }
}
