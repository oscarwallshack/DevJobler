<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateOfferRequest extends FormRequest
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
            'offer_name' => 'required|string|max:255',
            'offer_company' => 'required|string|max:255',
            'offer_image_src' => 'nullable',
            'offer_email' => 'required|email|max:255',
            'offer_tel_num' => 'required|numeric|digits:9',
            'offer_company_website' => 'required|string|max:255',
            'offer_company_address' => 'required|string|max:255',
            'offer_lvl' => 'required|string|max:255',
            'offer_type' => 'required|string|max:255',
            'offer_working_place' => 'required|string|max:255',
            'offer_recruitment_method' => 'required|string|max:255',
            'offer_description' => 'required|string|max:1500',
            'offer_requirements' => 'required',
            'offer_salary_max' => 'required|numeric|between:1100,50000',
            'offer_salary_min' => 'required|numeric|between:1000,45000',
            'offer_tasks' => 'required|string|max:1500',
            'company_id' => 'nullable',   //id employ
        ];
    }
}
