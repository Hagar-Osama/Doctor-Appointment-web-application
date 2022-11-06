<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\DoctorInterface;
use App\Http\Traits\DepartmentTraits;
use App\Http\Traits\DoctorTraits;
use App\Http\Traits\FilesTraits;
use App\Models\Department;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorRepository implements DoctorInterface
{

    use DoctorTraits;
    use FilesTraits;
    use DepartmentTraits;
    private $userModel;
    private $depModel;

    public function __construct(User $user, Department $department)
    {
        $this->userModel = $user;
        $this->depModel = $department;

    }

    public function index()
    {
        $doctors = $this->getAllDoctors();
        return view('dashboard.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $departments = $this->getAllDepartments();
        return view('dashboard.doctors.create', compact('departments'));
    }

    public function store($request)
    {
        try {
            $image = $request->file('image');
            $imageName = $image->hashName();
            $this->uploadFile($image, 'doctors/' . $request->name, $imageName, null);
            $this->userModel::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'department' => $request->department,
                'image' => $imageName,
                'description' => $request->description,
                'education' => $request->education

            ]);
            session()->flash('status', 'Doctor is Added Successfully');
            return redirect()->route('doctor.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($doctor_id)
    {
        $doctor = $this->getDoctorById($doctor_id);
        $departments = $this->getAllDepartments();
        return view('dashboard.doctors.edit', compact('doctor', 'departments'));
    }

    public function update($request)
    {
        // dd($request->all());
        try {
            $doctor = $this->getDoctorById($request->doctor_id);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->hashName();
                $this->uploadFile($image, 'doctors/' . $request->name, $imageName, 'storage/doctors/' . $request->name . '/' . $doctor->image);
            }
            $doctor->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'department' => $request->department,
                'image' => isset($imageName) ? $imageName : $doctor->image,
                'description' => $request->description,
                'education' => $request->education

            ]);
            session()->flash('status', 'Doctor is Updated Successfully');
            return redirect()->route('doctor.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $doctor = $this->getDoctorById($request->doctor_id);
        $doctor->delete();
            $this->deleteFile('storage/doctors/' . $doctor->name);
            session()->flash('status', 'Doctor is Deleted Successfully');
            return redirect()->route('doctor.index');


    }
}
