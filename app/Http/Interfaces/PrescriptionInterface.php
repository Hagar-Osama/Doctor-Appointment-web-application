<?php
namespace App\Http\Interfaces;

interface PrescriptionInterface {
    public function index();

    public function create();

    public function store($request);

    public function show($userId, $date);

    public function getAllPrescriptions();



}
