<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UpdateEmployeerRequest extends FormRequest
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
            'employeer_name' => 'required|max:255',
            'employeer_surname' => 'required|max:255',
            'employeer_email' => 'required|max:255',
            'employeer_tel_num' => 'required|max:8',
            'employeer_adress' => 'required|max:255',
            'employeer_description' => 'required|max:255',
            'employeer_status' => 'required|max:255',
            'employeer_education' => 'required|max:255',
        ];
    }
}
