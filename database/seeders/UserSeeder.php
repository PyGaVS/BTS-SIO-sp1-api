<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('12345678');
        $userTypes = [
            1 => 'customer',
            2 => 'driver'
        ];

        foreach($userTypes as $id => $label) {
            UserType::factory()
                ->create([
                    'label' => $label,
                ]);
        }
        //AGENTS
//        foreach(range(1, 9) as $i){
        for($i = 1; $i < 9; $i++) {
            $agent = User::factory()
                ->create([
                    'firstname' => 'client',
                    'lastname' => '0'.$i,
                    'email' => 'client0'.$i.'@seven.fr',
                    'password' => $password,
                    'street' => null,
                    'postalCode' => null,
                    'city' => null,
                    'phone' => null,
                    'licenseNumber' => null,
                    'user_type_id' => 1,
                    'agency_id' => rand(1, 3)
                ]);

        }

        //DRIVERS
        User::factory()->count(15)
            ->create([
                'user_type_id' => 2
            ]);
    }
}
