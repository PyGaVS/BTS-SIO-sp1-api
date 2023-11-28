<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::factory()->create([
            'licensePlate' => 'XE-456-TR',
            'status' => 'Opérationnelle',
            'isClean' => 1,
            'mileage' => 45000
        ]);
        Car::factory()->count(30)->create();
    }
}
