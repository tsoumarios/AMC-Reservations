<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyProfle extends FormRequest
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
            'company_email' => '',
            'company_name' => '',
            'phone_num' => '',
            'address' => '',
            'post_code' => '',
            'city' => '',
            'profile_photo_path' => '',
            'afm' => '',
            'rsv_availabillity' => ''
        ];
    }
}
