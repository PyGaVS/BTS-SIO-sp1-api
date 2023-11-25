<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maintenance>
 */
class MaintenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private function documentPicker(): string
    {
        $documents = array(
            'Document.pdf',
            'Document_2.pdf',
            'Document_suspicieux.pdf',
        );
        return $documents[rand(0, count($documents) - 1)];
    }

    public function definition(): array
    {
        return [
            'date' => fake()->dateTime(),
            'document' => $this->documentPicker(),
            'reason' => fake()->realText(30),
            'duration_day' => fake()->datetime(),
            'duration_hour' => fake()->datetime(),
            'car_id' => rand(1, 25),
        ];
    }
}
