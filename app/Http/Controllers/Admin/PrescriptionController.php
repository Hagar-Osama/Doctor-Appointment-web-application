<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\PrescriptionInterface;
use App\Http\Requests\AddPrescriptionRequest;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    private $prescriptionInterface;

    public function __construct(PrescriptionInterface $prescriptionInterface)
    {
        $this->prescriptionInterface = $prescriptionInterface;

    }

    public function index()
    {
        return $this->prescriptionInterface->index();
    }

    public function create()
    {
        return $this->prescriptionInterface->create();
    }


    public function store(AddPrescriptionRequest $request)
    {
        return $this->prescriptionInterface->store($request);
    }

    public function show($userId, $date)
    {
        return $this->prescriptionInterface->show($userId, $date);

    }

    public function getAllPrescriptions()
    {
        return $this->prescriptionInterface->getAllPrescriptions();

    }


}
