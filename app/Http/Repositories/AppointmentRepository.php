<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AppointmentInterface;
use App\Http\Traits\AppointmentTraits;
use App\Http\Traits\DoctorTraits;
use App\Models\Appointment;
use Exception;
use Illuminate\Http\Request;

class AppointmentRepository implements AppointmentInterface
{

    use AppointmentTraits;
    private $appointmentModel;

    public function __construct(Appointment $appointment)
    {
        $this->appointmentModel = $appointment;
    }

    public function index()
    {

    }

    public function create()
    {
        return view('dashboard.appointment.create');
    }

    public function store($request)
    {
        try {

            session()->flash('status', 'Doctor is Added Successfully');
            return redirect()->route('doctor.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        return view('dashboard.doctors.edit', compact('doctor'));
    }

    public function update($request)
    {
        try {

            session()->flash('status', 'Doctor is Updated Successfully');
            return redirect()->route('doctor.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {

            session()->flash('status', 'Doctor is Deleted Successfully');
            return redirect()->route('doctor.index');


    }
}
