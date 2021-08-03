<?php

namespace App\Http\Requests\Admin\Location;

use Illuminate\Foundation\Http\FormRequest;

class AddNewDistrictRequest extends FormRequest
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
            'js_country_id' => 'required|exists:countries,_id',
            'js_state_id' => 'required|exists:states,_id',
            'js_district_name' => 'required|regex:/^[a-zA-Z\s]+$/u'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            '*.required' => 'This field is required.',
            'js_country_id.exists' => 'This country does not exists. Please choose another one.',
            'js_state_id.min' => 'This state does not exists. Please choose another one.',
            'js_district_name.regex' => 'Please enter a valid district name.'
        ];
    }
}
