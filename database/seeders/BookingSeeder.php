<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\BookingUser;
use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drivers = User::where('user_type_id', '=', 2)->get();
        $customers = User::where('user_type_id', '=', 1)->get();
        $cars = Car::all();
        $bookings = Booking::factory()
            ->count(40)
            ->create();

        foreach($bookings as $booking) {
            $driver1_id = rand(1, count($drivers)-1);
            $driver2_id = rand(1, count($drivers)-1);

            //Drivers
            BookingUser::factory()
                ->count(1)
                ->create([
                    'booking_id' => $booking['id'],
                    'user_id' => $drivers[$driver1_id]['id']
                ]);

            if($driver1_id != $driver2_id and rand(1, 5) <= 3){
                BookingUser::factory()
                    ->count(1)
                    ->create([
                        'booking_id' => $booking['id'],
                        'user_id' => $drivers[$driver2_id]['id']
                    ]);
            }
        }
    }
}
