<?php
namespace App\Http\Interfaces;

interface BookingListInterface {

    public function index();

    public function filterPatient($request);

    public function updateStatus($bookingId);

    public function allBookedAppointments();





}
