@extends('layouts.app')

@section('title', 'Edit Booking')

@section('content')
    <fieldset>
        <legend>Edit your booking</legend>
        <form action="{{ route('booking.update', $booking->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col">
                    <div class="form-group">
                      <label for="booking_date">Booking Date</label>
                        <input type="date" name="booking_date" value="{{ old('booking_date') ?? $booking->booking_date->format('Y-m-d') }}" id="booking_date" class="form-control" placeholder="" >
                      @error('booking_date')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                      <label for="booking_time">Booking time</label>
                      <input type="time" name="booking_time" value="{{ old('booking_time') ?? $booking->booking_time }}" id="booking_time" class="form-control" placeholder="" >
                      @error('booking_time')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                      <label for="seats_nbr">Number of seats</label>
                      <input type="number" name="seats_nbr" min="1" max="20" value="{{ old('seats_nbr') ?? $booking->seats_nbr }}" id="seats_nbr" class="form-control" placeholder="" >
                      @error('seats_nbr')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-outline-primary btn-block">Confirm update</button>
            </div>
        </form>
    </fieldset>
@endsection