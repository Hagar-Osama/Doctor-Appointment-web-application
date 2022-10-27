<?php

namespace App\Observers;

use App\Mail\AppointmentMail;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AppointmentObserver
{
    /**
     * Handle the Booking "created" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function created(Booking $booking)
    {
        $doctorName = User::where('id', request()->doctorId)->first();
        $mail = [
            'name' => auth()->user()->name,
            'doctorName' => $doctorName->name,
            'time' => request()->time,
            'date' => request()->date
        ];

        Mail::to(auth()->user()->email)->send(new AppointmentMail($mail));
    }

    /**
     * Handle the Booking "updated" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function updated(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "deleted" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function deleted(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "restored" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function restored(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "force deleted" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function forceDeleted(Booking $booking)
    {
        //
    }
}
