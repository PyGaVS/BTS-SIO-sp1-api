<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Damage>
 */
class DamageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = array(
            'RS',
            'RP',
            'EC'
        );

        return [
            'name' => $names[rand(0,2)],
            'damagedPart' => fake()->lastName(),
            'report_id' => rand(1,50)
        ];
    }
}
