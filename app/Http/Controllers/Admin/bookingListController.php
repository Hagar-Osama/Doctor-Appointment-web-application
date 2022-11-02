<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\BookingListInterface;
use Illuminate\Http\Request;

class bookingListController extends Controller
{
    private $bookingInterface;

    public function __construct(BookingListInterface $bookingInterface)
    {
        $this->bookingInterface = $bookingInterface;

    }

    public function index()
    {
        return $this->bookingInterface->index();
    }

    public function filterPatient(Request $request)
    {
        return $this->bookingInterface->filterPatient($request);

    }

    public function updateStatus($bookingId)
    {
        return $this->bookingInterface->updateStatus($bookingId);

    }

    public function allBookedAppointments()
    {
        return $this->bookingInterface->allBookedAppointments();

    }



}
