<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\BookingListInterface;
use App\Models\Booking;

class BookingListRepository implements BookingListInterface
{


    private $bookingModel;

    public function __construct(Booking $booking)
    {
        $this->bookingModel = $booking;
    }

    public function index()
    {
        date_default_timezone_set('Africa/Cairo');
        $bookings = $this->bookingModel::latest()->whereDate('date', date('Y-m-d'))->get();
        return view('dashboard.bookings.index', compact('bookings'));
    }

    public function filterPatient($request)
    {
        if ($request->date) {
            $bookings = $this->bookingModel::latest()->whereDate('date', $request->date)->get();
            return view('dashboard.bookings.index', compact('bookings'));
        }
    }

    public function updateStatus($bookingId)
    {
        $booking = $this->bookingModel::find($bookingId);
        // $booking->checkedUp != $booking->checkedUp;
        // $booking->save();
        if ($booking->checkedUp == 'no') {
            $booking->update([
                'checkedUp' => 'yes'
            ]);
        } else {
            $booking->update([
                'checkedUp' => 'no'
            ]);
        }
        return redirect()->back();
    }

    public function allBookedAppointments()
    {
        $bookings = $this->bookingModel::latest()->paginate(20);
        return view('dashboard.bookings.all', compact('bookings'));
    }
}
