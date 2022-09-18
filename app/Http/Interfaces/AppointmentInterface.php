<?php
namespace App\Http\Interfaces;

interface AppointmentInterface {
    public function index();

    public function create();

    public function store($request);

    public function edit($Id);

    public function update($request);

    public function destroy($request);
}
