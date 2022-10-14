<?php
namespace App\Http\Interfaces;

interface AppointmentInterface {
    public function index();

    public function create();

    public function store($request);

    public function checkAppointnmentTime($request);

    public function show($appointmentId);

    public function updateTime($request);

    // public function destroy($request);
}
