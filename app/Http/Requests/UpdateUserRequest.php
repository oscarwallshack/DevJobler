<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UpdateUserRequest extends FormRequest
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
            'employee_name' => 'required|max:255',
            'employee_surname' => 'required|max:255',
            'employee_email' => 'required|max:255',
            'employee_tel_num' => 'required|max:8',
            'employee_adress' => 'required|max:255',
            'employee_description' => 'required|max:255',
            'employee_status' => 'required|max:255',
            'employee_education' => 'required|max:255',
        ];
    }
}
