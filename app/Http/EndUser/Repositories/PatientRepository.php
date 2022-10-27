<?php

namespace App\Http\EndUser\Repositories;

use App\Http\EndUser\Interfaces\PatientInterface;
use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Patient;
use App\Models\Role;
use App\Models\Time;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PatientRepository implements PatientInterface
{

    private $userModel;
    private $bookingModel;
    private $timeModel;

    public function __construct(User $patient, Booking $booking, Time $time)
    {
        $this->userModel = $patient;
        $this->bookingModel = $booking;
        $this->timeModel = $time;
    }

    public function registerPage()
    {
        return view('endUser.register');
    }

    public function register($request)
    {
        $role = Role::where('name', 'patient')->first();
        $patient = $this->userModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role->id,

        ]);
        Auth::login($patient);
        return redirect()->route('endUser.welcome');
    }

    public function loginPage()
    {
        return view('endUser.login');
    }

    public function login($request)
    {

        $adminData = $request->only('email', 'password');
        if (auth()->attempt($adminData)) {
            $request->session()->regenerate();
            return redirect()->route('endUser.welcome');
        }
        return back()->withErrors([
            'email' => 'The Provided Credentials Don\'t Match Our Record',
            'password' => 'The Provided Email Doesn\'t Match Our Record',
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('endUser.welcome');
    }

    public function bookAppointment($request)
    {
        DB::beginTransaction();
        //first patient will book an appointment then we will update the status in the time table to unavailable
        if ($this->bookingModel::where('user_id', auth()->user()->id)->whereDate('created_at', date('Y-m-d'))->exists()) {
            session()->flash('error', 'You Have Already Booked an Appointment');
            return redirect()->back();
        } else {
            try {

                $this->bookingModel::create([
                    'user_id' => auth()->user()->id,
                    'doctor_id' => $request->doctorId,
                    'time' => $request->time,
                    'date' => $request->date

                ]);
                $this->timeModel::where([['appointment_id', $request->appointmentId], ['time', $request->time]])->update([
                    'status' => 'unavailable'
                ]);

                DB::commit();
                session()->flash('success', 'Appointment Has Been Booked Successfully');
                return redirect()->back();
            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }
    }

    public function showBookings()
    {
        $myBookings = $this->bookingModel::where('user_id', auth()->user()->id)->latest()->get();
        return view('myBooking', compact('myBookings'));

    }
}
