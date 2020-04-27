<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function today()
    {
        $todayBookings = Booking::where('booking_date', date('Y-m-d'))
                            ->orderBy('booking_time')
                            ->with('user')
                            ->get();
        return view('admin.bookings.today', compact('todayBookings'));
    }

    public function coming()
    {
        $comingBookings = Booking::where('booking_date', '>', date('Y-m-d'))
                            ->orderBy('booking_date')
                            ->orderBy('booking_time')
                            ->with('user')
                            ->get();
        return view('admin.bookings.coming', compact('comingBookings'));
    }

    public function history()
    {
        $bookingsHistory = Booking::where('booking_date', '<', date('Y-m-d'))
                            ->orderBy('booking_date', 'desc')
                            ->orderBy('booking_time')
                            ->with('user')
                            ->get();
        return view('admin.bookings.history', compact('bookingsHistory'));
    }

}
