<?php
namespace App\Http\Interfaces;

interface DoctorInterface {
    public function index();

    public function create();

    public function store($request);

    public function edit($doctorId);

    public function update($request);

    public function destroy($request);
}
