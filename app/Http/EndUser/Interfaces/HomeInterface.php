<?php
namespace App\Http\EndUser\Interfaces;

interface HomeInterface {

    public function index();

    public function makeAppointment($doctorId, $date);
    
    public function findDoctorBasedOnDate($request);




}
