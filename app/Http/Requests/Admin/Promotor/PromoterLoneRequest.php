<?php

namespace App\Http\Requests\Admin\Promotor;

use Illuminate\Foundation\Http\FormRequest;

class PromoterLoneRequest extends FormRequest
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
            'first_name'   =>  'required',
            'last_name'    =>  'required',
            'email'        =>  'required|unique:App\Models\User,email',
            'level'        =>  'required',
            'country'      =>  'required|exists:countries,_id',
            'state'        =>  'required|exists:states,_id',
            'district'     =>  'required|exists:districts,_id',
            'taluk'        =>  'required|exists:taluks,_id',
            'country_code' =>  'required',
        ];
    }
}