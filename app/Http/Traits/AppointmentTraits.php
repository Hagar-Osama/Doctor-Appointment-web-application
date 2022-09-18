<?php
namespace App\Http\Traits;


trait AppointmentTraits {

    public function getAppointments()
    {
        return $this->appointmentModel::get();
    }

    public function getAppointmentById($appId)
    {
        return $this->appointmentModel::findOrFail($appId);
    }
}
