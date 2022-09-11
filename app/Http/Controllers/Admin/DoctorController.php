<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\DoctorInterface;
use App\Http\Requests\AddDoctorRequest;
use App\Http\Requests\DeleteDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private $doctorInterface;

    public function __construct(DoctorInterface $doctorInterface)
    {
        $this->doctorInterface = $doctorInterface;

    }

    public function index()
    {
        return $this->doctorInterface->index();
    }

    public function create()
    {
        return $this->doctorInterface->create();
    }


    public function store(AddDoctorRequest $request)
    {
        return $this->doctorInterface->store($request);
    }

    public function edit($doctorId)
    {
        return $this->doctorInterface->edit($doctorId);
    }

    public function update(UpdateDoctorRequest $request)
    {
        return $this->doctorInterface->update($request);
    }

    public function destroy(DeleteDoctorRequest $request)
    {
        return $this->doctorInterface->destroy($request);
    }
}
