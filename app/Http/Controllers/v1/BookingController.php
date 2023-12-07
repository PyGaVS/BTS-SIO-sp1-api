<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\BookingUser;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with('bookingUser')->get();
        //dd($bookings[0]['bookingUser']);
        foreach($bookings as $booking){
            $drivers = [];
            foreach($booking['bookingUser'] as $bookingUser){
                $drivers[] = User::find($bookingUser['user_id']);
            }
            Car::find($booking->car);
            CarModel::find($booking->carModel);
            //$booking['customer'] = User::find($booking->customer);
            $booking['drivers'] = $drivers;

        }

        return response()->json($bookings);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /*
        beginDate : datetime
        endDate : datetime
        nbPassengers : int
        startAgency : int
        endAgency : int
        drivers : array
        model_id : int
         */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        /*
        $request['status'] = 'à venir';
        $request['number'] = fake()->randomNumber(7);
        */
        $drivers = explode(';', $request['drivers']);
        $car = Car::where('car_model_id', '=', $request['car_model_id'])
            ->where('status', '=', 'Opérationnelle')->first(); //PEUT ÊTRE NULL

        if(!$car){
            return response()->json(['error' => 'no valid car available']);
        }
        $booking = Booking::create([
            'number' => fake()->randomNumber(7),
            'status' => 'à venir',
            'nbPassenger' => $request['nbPassenger'],
            'car_id' => $car->id,
            'beginDate' => $request['beginDate'],
            'endDate' => $request['endDate'],
            'startAgency' => $request['startAgency'],
            'endAgency' => $request['endAgency'],
            'car_model_id' => $request['car_model_id'],
            'customer' => Auth::user()->id
        ]);

        foreach($drivers as $driver){
            BookingUser::create([
                'user_id' => $driver,
                'booking_id' => $booking->id
            ]);
        }

        $car->update(['status' => 'A préparer']);

        return response()->json($booking);
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        $booking = Booking::with('bookingUser')->find($booking->id);
        $drivers = [];
        foreach($booking['bookingUser'] as $bookingUser){
            $drivers[] = User::find($bookingUser['user_id']);
        }
        Car::find($booking->car);
        CarModel::find($booking->carModel);
        //$booking['customer'] = User::find($booking->customer);
        $booking['drivers'] = $drivers;

        return response()->json($booking);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
