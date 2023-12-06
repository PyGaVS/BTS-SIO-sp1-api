<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\User;

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
            //dd($booking);
            foreach($booking['bookingUser'] as $bookingUser){
                $user = User::find($bookingUser['user_id']);
                if($user->user_type_id == 1){
                    $customer = $user;
                } else {
                    $drivers[] = $user;
                }

            }
            $booking['customer'] = $customer;
            $booking['drivers'] = $drivers;

        }

        return response()->json($bookings);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        //
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
        $booking['customer'] = User::find($booking->customer);
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
