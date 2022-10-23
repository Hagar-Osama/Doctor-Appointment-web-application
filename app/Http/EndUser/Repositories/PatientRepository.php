<?php

namespace App\Http\EndUser\Repositories;

use App\Http\EndUser\Interfaces\PatientInterface;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PatientRepository implements PatientInterface
{

    private $userModel;

    public function __construct(User $patient)
    {
        $this->userModel = $patient;
    }

    public function registerPage()
    {
        return view('endUser.register');
    }

    public function register($request)
    {
        $role = Role::where('name', 'patient')->first();
        $patient = $this->userModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role->id,

        ]);
        Auth::login($patient);
        return redirect()->route('endUser.welcome');
    }

    public function loginPage()
    {
        return view('endUser.login');
    }

    public function login($request)
    {

        $adminData = $request->only('email', 'password');
        if (auth()->attempt($adminData)) {
            $request->session()->regenerate();
            return redirect()->route('endUser.welcome');
        }
        return back()->withErrors([
            'email' => 'The Provided Credentials Don\'t Match Our Record',
            'password' => 'The Provided Email Doesn\'t Match Our Record',
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('endUser.welcome');
    }





}
