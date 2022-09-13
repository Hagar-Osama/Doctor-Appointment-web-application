<?php
namespace App\Http\Traits;

use App\Models\Role;

trait DoctorTraits {

    public function getAllDoctors()
    {
        $roleId = Role::where('name', 'doctor')->pluck('id');
        return $this->userModel::where('role_id', $roleId)->get();
    }

    public function getDoctorById($doctorId)
    {
        return $this->userModel::findOrFail($doctorId);
    }
}
