<?php
namespace App\Http\EndUser\Interfaces;

interface PatientInterface {

    public function registerPage();

    public function register($request);

    public function loginPage();

    public function login($request);

    public function logout();

    public function bookAppointment($request);

    public function showBookings();





}
