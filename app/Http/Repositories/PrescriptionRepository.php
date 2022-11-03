<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\PrescriptionInterface;
use App\Models\Booking;
use App\Models\Prescription;
use App\Models\Role;
use App\Models\User;
use Exception;


class PrescriptionRepository implements PrescriptionInterface
{


    private $userModel;
    private $bookingModel;
    private $prescriptionModel;


    public function __construct(User $user, Booking $booking, Prescription $prescription)
    {
        $this->userModel = $user;
        $this->bookingModel = $booking;
        $this->prescriptionModel = $prescription;
    }

    public function index()
    {
        date_default_timezone_set('Africa/Cairo');
        $bookings = $this->bookingModel::where([['date', date('Y-m-d')],['checkedUp', 'yes']])->get();
        return view('dashboard.prescriptions.index', compact('bookings'));
    }

    public function create()
    {
        return view('dashboard.prescriptions.create');
    }

    public function store($request)
    {
        try {
            $this->prescriptionModel::create([
                'disease_name' => $request->disease_name,
                'symptoms' => $request->symptoms,
                'user_id' => $request->user_id,
                'doctor_id' => $request->doctor_id,
                'medicine' => $request->medicine,
                'how_to_use_medicine' => $request->how_to_use_medicine,
                'feedback' => $request->feedback,
                'signature' => $request->signature,
                'date' => $request->date

            ]);
            session()->flash('status', 'Prescriptions is Added Successfully');
            return redirect()->route('prescriptions.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


}
