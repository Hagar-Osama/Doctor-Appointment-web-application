<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\DepartmentInterface;
use App\Http\Requests\AddDepartmentRequest;
use App\Http\Requests\DeleteDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private $departmentInterface;

    public function __construct(DepartmentInterface $departmentInterface)
    {
        $this->departmentInterface = $departmentInterface;

    }

    public function index()
    {
        return $this->departmentInterface->index();
    }


    public function store(AddDepartmentRequest $request)
    {
        return $this->departmentInterface->store($request);
    }

    public function update(UpdateDepartmentRequest $request)
    {
        return $this->departmentInterface->update($request);
    }

    public function destroy(DeleteDepartmentRequest $request)
    {
        return $this->departmentInterface->destroy($request);
    }
}

