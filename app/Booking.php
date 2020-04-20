<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{

    protected $guarded = [];
    // ou bien
    // protected $fillable = ['booking_date', 'bookin_time', 'seats_nbr', 'user_id'];

    protected $dates = [
        'booking_date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeComingBookings($query)
    {
        return $query->where('booking_date', '>=', now());
    }

    public function scopePassedBookings($query)
    {
        return $query->where('booking_date', '<', now());
    }

    public function setBookingTimeAttribute($value)
    {
        $this->attributes['booking_time'] = Carbon::parse($value)->format('H:i');
    }
}
