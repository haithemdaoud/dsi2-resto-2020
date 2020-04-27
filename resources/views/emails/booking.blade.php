@component('mail::message')
# DSi-Restaurant

Dear **{{ Auth::user()->name }}**

We are sending you this message to let you knoy that we recieved your booking and look forward to see you.<br>
Your booking will be on **{{ $booking->booking_date->format('l, F jS Y') }}** at **{{ date('H:i', strtotime($booking->booking_time)) }}**.<br>
You will be **{{ $booking->seats_nbr }}** persons.

@component('mail::button', ['url' => route('booking.show', $booking->id)])
See booking details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
