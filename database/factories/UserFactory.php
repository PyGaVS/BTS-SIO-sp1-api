<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstname = fake()->firstname();
        $lastname = fake()->lastname();
        $password = Hash::make('12345678');

        return [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => strtolower($firstname.'.'.$lastname.'@gmail.com'),
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10),
            'street' => fake()->streetName(),
            'postalCode' => fake()->postcode(),
            'city' => fake()->city(),
            'phone' => fake()->phoneNumber(),
            'licenseNumber' => strtoupper(Str::random(8)),
            'user_type_id' => 2
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
