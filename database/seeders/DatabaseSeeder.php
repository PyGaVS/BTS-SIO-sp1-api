<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CarModel;
use App\Models\Journey;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AgencySeeder::class,
            UserSeeder::class,
            BookingSeeder::class,
            CarModelSeeder::class,
            CarSeeder::class,
            JourneySeeder::class,
            MaintenanceSeeder::class,
            ReportSeeder::class,
            DamageSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
