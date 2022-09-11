<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\DoctorInterface;
use App\Http\Traits\DoctorTraits;
use App\Models\User;

class DoctorRepository implements DoctorInterface {

    use DoctorTraits;
    private $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;

    }

    public function index()
    {
        $doctors = $this->getAllDoctors();
        return view('dashboard.doctors.index', compact('doctors'));

    }

    public function create()
    {
        return view('dashboard.doctors.create');

    }

    public function store($request)
    {

    }

    public function edit($doctorId)
    {
        $doctor = $this->getDoctorById($doctorId);
        return view('dashboard.doctors.edit', compact('doctor'));

    }

    public function update($request)
    {

    }

    public function destroy($request)
    {

    }
}
