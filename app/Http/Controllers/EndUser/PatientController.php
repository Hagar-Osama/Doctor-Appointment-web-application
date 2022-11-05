<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\EndUser\Interfaces\PatientInterface;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PatientBookingAppointmentRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    private $patientInterface;

    public function __construct(PatientInterface $patientInterface)
    {
        $this->patientInterface = $patientInterface;

    }

    public function register(RegisterRequest $request)
    {
        return $this->patientInterface->register($request);
    }

    public function login(LoginRequest $request)
    {
        return $this->patientInterface->login($request);
    }

    public function registerPage()
    {
        return $this->patientInterface->registerPage();

    }

    public function loginPage()
    {
        return $this->patientInterface->loginPage();

    }

    public function logout()
    {
        return $this->patientInterface->logout();

    }

    public function bookAppointment(PatientBookingAppointmentRequest $request)
    {
        return $this->patientInterface->bookAppointment($request);

    }

    public function showBookings()
    {
        return $this->patientInterface->showBookings();

    }

    public function getAllMyPrescriptions()
    {
        return $this->patientInterface->getAllMyPrescriptions();

    }



}
