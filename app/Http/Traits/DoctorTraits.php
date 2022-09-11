<?php
namespace App\Http\Traits;

trait DoctorTraits {

    public function getAllDoctors()
    {
        return $this->userModel::get();
    }

    public function getDoctorById($doctorId)
    {
        return $this->userModel::findOrFail($doctorId);
    }
}
