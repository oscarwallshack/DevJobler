<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UpdateEmployeeRequest extends FormRequest
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
            'employee_name' => 'required|string|max:255',
            'employee_surname' => 'required|string|max:255',
            'employee_email' => 'required|email|max:255',
            'employee_tel_num' => 'nullable|numeric|digits:9',
            'employee_address' => 'nullable|string|max:255',
            'employee_description' => 'nullable',
            'employee_skills' => 'nullable',
            'employee_cv' => 'nullable',
            'employee_image_src' => 'nullable|image',
            'employee_status' => 'nullable|max:255',
            'employee_education' => 'nullable|max:255',

        ];
    }
}
