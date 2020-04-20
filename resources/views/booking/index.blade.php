@extends('layouts.app')

@section('title', 'My bookings')

@section('content')

@if (session('AddBooking'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('AddBooking') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session('deleteBooking'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('deleteBooking') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<a href="{{ route('booking.create') }}" class="btn btn-outline-primary btn-lg float-right" role="button"
    aria-pressed="true">Book now !</a>
<h1>List of my bookings</h1>
<div class="row">
    <div class="col">
        <h3>Upcoming bookings</h3>
        <ul class="list-group">
            @foreach ($comingBookings as $booking)
            <a href="{{ route('booking.show', $booking->id) }}">
                <li class="list-group-item list-group-item-action">
                    Your booking will be for the <strong>{{ $booking->booking_date->format('d/m/Y') }}</strong> at
                    <strong>{{ date('H:i', strtotime($booking->booking_time)) }}</strong>
                    <span class="badge badge-primary badge-pill float-right">{{ $booking->seats_nbr }} persons</span>
                </li>
            </a>
            @endforeach
        </ul>
    </div>
    <div class="col">
        <h3>Passed bookings</h3>
        <ul class="list-group">
            @foreach ($passedBookings as $booking)
            <li class="list-group-item list-group-item-action">
                Your booking was for the {{ $booking->booking_date->format('d/m/Y') }} at {{ date('H:i', strtotime($booking->booking_time)) }}
                <span class="badge badge-primary badge-pill float-right">{{ $booking->seats_nbr }} persons</span>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
