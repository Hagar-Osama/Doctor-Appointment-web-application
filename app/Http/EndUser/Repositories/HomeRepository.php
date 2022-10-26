<?php

namespace App\Http\EndUser\Repositories;

use App\Http\EndUser\Interfaces\HomeInterface;
use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;


class HomeRepository implements HomeInterface
{

    private $userModel;
    private $appointmentModel;
    private $timeModel;

    public function __construct(User $user, Appointment $appointment, Time $time)
    {
        $this->userModel = $user;
        $this->appointmentModel = $appointment;
        $this->timeModel = $time;
    }

    public function index()
    {
        date_default_timezone_set('Africa/Cairo');
        $appointments = $this->appointmentModel::where('date', date('Y-m-d'))->get();
        return view('welcome', compact('appointments'));
    }

    public function makeAppointment($doctorId, $date)
    {
        $appointment = $this->appointmentModel::where([['date', $date],['user_id', $doctorId]])->first();
        $times = $this->timeModel::where([['appointment_id', $appointment->id],['status', 'available']])->get();
        $doctorId = $doctorId;
        return view('appointment', compact('appointment', 'times', 'date', 'doctorId'));

    }

    public function findDoctorBasedOnDate($request)
    {
        $request->validate([
            'date'=> 'required'
        ]);
        $appointments = $this->appointmentModel::where('date', $request->date)->get();
        return view('welcome', compact('appointments'));

    }



}
