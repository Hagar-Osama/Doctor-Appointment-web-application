<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAppointmentRequest extends FormRequest
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
            'date' => 'required|unique:appointments,date,NULL,id,user_id,'.auth()->user()->id,
            // 'status' => 'required|in:available,unavailable',
            'time.*' => 'required',
            'appointment_id' => 'exists:appointments,id',
        ];
    }
}
