<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\AppointmentInterface;
use App\Http\Requests\AddAppointmentRequest;
use App\Http\Requests\DeleteAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    private $appointmentInterface;

    public function __construct(AppointmentInterface $appointmentInterface)
    {
        $this->appointmentInterface = $appointmentInterface;

    }

    public function index()
    {
        return $this->appointmentInterface->index();
    }

    public function create()
    {
        return $this->appointmentInterface->create();
    }


    public function store(AddAppointmentRequest $request)
    {
        return $this->appointmentInterface->store($request);
    }

    public function edit($Id)
    {
        return $this->appointmentInterface->edit($Id);
    }

    public function update(UpdateAppointmentRequest $request)
    {
        return $this->appointmentInterface->update($request);
    }

    public function destroy(DeleteAppointmentRequest $request)
    {
        return $this->appointmentInterface->destroy($request);
    }
}
