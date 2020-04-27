@extends('layouts.app')

@section('content')
    
<h1>Coming Bookings</h1>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Booking date</th>
        <th scope="col">Booking time</th>
        <th scope="col">Number of seats</th>
        <th scope="col">User name</th>
        <th scope="col">User phone</th>
        <th scope="col">User email</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($comingBookings as $booking)            
            <tr>
                <td> {{ $booking->booking_date->format('d/m/Y') }}</td>
                <td> {{ date('H:i', strtotime($booking->booking_time)) }}</td>
                <td> {{ $booking->seats_nbr }}</td>
                <td>{{ $booking->user->name }}</td>
                <td>{{ $booking->user->phone }}</td>
                <td>{{ $booking->user->email }}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection