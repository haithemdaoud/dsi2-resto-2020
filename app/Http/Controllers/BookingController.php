<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewBooking;

class BookingController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comingBookings = Auth::user()->bookings()->comingBookings()->orderBy('booking_date')->get();
        $passedBookings = Auth::user()->bookings()->passedBookings()->orderBy('booking_date', 'desc')->get();
        return view('booking.index', [
            'comingBookings' => $comingBookings,
            'passedBookings' => $passedBookings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules());

        $booking = new Booking;

        $booking->user_id = Auth::id();
        $booking->booking_date = $request->booking_date;
        $booking->booking_time = $request->booking_time;
        $booking->seats_nbr = $request->seats_nbr;

        $booking->save();

        //Mail::to(Auth::user()->email)->send(new NewBooking($booking));

        return redirect()->route('booking.index')->with('AddBooking', 'New booking added successfully. We sent you an email, please check your inbox.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('booking.show')->with('booking', $booking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $validatedData = $request->validate($this->validationRules());

        $booking->update($validatedData);

        return redirect()->route('booking.show', $booking->id)->with('updateBooking', 'Booking updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('booking.index')->with('deleteBooking', 'Booking deleted successfully');
    }

    private function validationRules()
    {
        return [
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'seats_nbr' => 'required|min:1|max:20'
        ];
    }
}
