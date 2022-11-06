<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UpdateCompanyRequest extends FormRequest
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

            'employer_name' => 'required|string|max:255',
            'employer_surname' => 'required|string|max:255',
            'employer_email' => 'nullable',
            'company_name' => 'required|string|max:255',
            'company_tel_num' => 'nullable',
            'company_address' => 'required|string|max:255',
            'company_nip' => 'required|numeric|digits:10',
            'company_website' => 'required|max:255',
            'company_description' => 'required|max:2000',
            'company_image_src' => 'nullable|image',
        ];
    }
}
