<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\BookingUser;
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
        $bookings = Booking::factory()
            ->count(40)
            ->create();

        foreach($bookings as $booking) {
            BookingUser::factory()
                ->count(rand(1, 2))
                ->create([
                    'booking_id' => $booking['id'],
                    'user_id' => $drivers[rand(1, count($drivers)-1)]['id']
                ]);
        }
    }
}
