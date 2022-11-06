<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\DepartmentInterface;
use App\Http\Traits\DepartmentTraits;
use App\Models\Department;
use Exception;

class DepartmentRepository implements DepartmentInterface
{

    use DepartmentTraits;
    private $depModel;

    public function __construct(Department $department)
    {
        $this->depModel = $department;
    }

    public function index()
    {
        $departments = $this->getAllDepartments();
        return view('dashboard.department.index', compact('departments'));
    }

    // public function create()
    // {
    //     return view('dashboard.doctors.create');
    // }

    public function store($request)
    {
        try {

            $this->depModel::create([

                'department' => $request->department,

            ]);
            session()->flash('status', 'Department is Added Successfully');
            return redirect()->route('department.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
            $department = $this->getDepartmentById($request->departmentId);

            $department->update([

                'department' => $request->department,

            ]);
            session()->flash('status', 'Department is Updated Successfully');
            return redirect()->route('deparment.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $department = $this->getDepartmentById($request->departmentId);
        $department->delete();
            session()->flash('status', 'Department is Deleted Successfully');
            return redirect()->route('department.index');


    }
}
