<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AppointmentInterface;
use App\Http\Traits\AppointmentTraits;
use App\Http\Traits\DoctorTraits;
use App\Models\Appointment;
use App\Models\Time;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentRepository implements AppointmentInterface
{

    use AppointmentTraits;
    private $appointmentModel;
    private $timeModel;

    public function __construct(Appointment $appointment, Time $time)
    {
        $this->appointmentModel = $appointment;
        $this->timeModel = $time;
    }

    public function index()
    {
        return view('dashboard.appointment.index');
    }

    public function create()
    {
        return view('dashboard.appointment.create');
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $appointment =  $this->appointmentModel::create([
                'user_id' => auth()->user()->id,
                'date' => $request->date,
            ]);
            foreach ($request->time as $time) {
                $this->timeModel::create([
                    'appointment_id' => $appointment->id,
                    'time' => $time,
                ]);
            }

            DB::commit();
            session()->flash('status', 'Appointment is Created Successfully for ' . $request->date);
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function checkAppointnmentTime($request)
    {
        $date = $request->date;
        $appointment = $this->appointmentModel::where([['date', $date], ['user_id', auth()->user()->id]])->first();
        if (!$appointment) {
            session()->flash('error', 'There Is No Time A vailable For This ' . $request->date);
            return redirect()->route('appointment.index');
        }
        $appointmentId = $appointment->id;
        $times = $this->timeModel::where('appointment_id', $appointmentId)->get();
        return view('dashboard.appointment.index', compact('date', 'times', 'appointmentId'));
    }

    public function show($appointmentid)
    {
        return view('dashboard.appointment.show');
    }

    public function updateTime($request)
    {
        try {
            $appointmentId = $request->appointmentId;
            $time = $this->timeModel::where('appointment_id', $appointmentId )->delete();
            foreach ($request->time as $time) {
                $this->timeModel::create([
                    'appointment_id' => $appointmentId,
                    'time' => $time,
                ]);
            }
            session()->flash('status', 'Appointment is Created Successfully for ' . $request->date);
            return redirect()->route('appointment.index');
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
