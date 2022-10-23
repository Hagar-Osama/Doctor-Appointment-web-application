<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\EndUser\Interfaces\HomeInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $homeInterface;

    public function __construct(HomeInterface $homeInterface)
    {
        $this->homeInterface = $homeInterface;

    }

    public function index()
    {
        return $this->homeInterface->index();
    }

    public function makeAppointment($doctorId, $date)
    {
        return $this->homeInterface->makeAppointment($doctorId, $date);

    }

    public function findDoctorBasedOnDate(Request $request)
    {
        return $this->homeInterface->findDoctorBasedOnDate($request);

    }


}
