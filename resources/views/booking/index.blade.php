@extends('layouts.app')

@section('title', 'My bookings')

@section('content')
    <a href="{{ route('booking.create') }}" class="btn btn-outline-primary btn-lg float-right" role="button" aria-pressed="true">Book now !</a>
    <h1>List of my bookings</h1>
    <div class="row">
        <div class="col">
            <h3>Upcoming bookings</h3>
            <ul class="list-group">
                @foreach ($comingBookings as $booking)
                    <li class="list-group-item list-group-item-action">
                        Your booking will be for the <strong>{{ $booking->booking_date }}</strong> at <strong>{{ $booking->booking_time }}</strong>
                        <span class="badge badge-primary badge-pill float-right">{{ $booking->seats_nbr }} persons</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col">
            <h3>Passed bookings</h3>
            <ul class="list-group">
                @foreach ($passedBookings as $booking)
                    <li class="list-group-item list-group-item-action">
                        Your booking was for the {{ $booking->booking_date }} at {{ $booking->booking_time }}
                        <span class="badge badge-primary badge-pill float-right">{{ $booking->seats_nbr }} persons</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection