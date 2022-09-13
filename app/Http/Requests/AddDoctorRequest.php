<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'gender' => 'required', 'in:male,female',
            'role_id' => 'required|exists:roles,id',
            'description' => 'required|min:10',
            'education' => 'required',
            'department' => 'required',
            'education' => 'required',
            'phone_number' => 'required',
            'address'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
