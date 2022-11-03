<?php
namespace App\Http\Interfaces;

interface PrescriptionInterface {
    public function index();

    public function create();

    public function store($request);

}
