<?php

namespace Database\Seeders;

use App\Models\Damage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DamageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Damage::factory()->count(50)->create();
    }
}
