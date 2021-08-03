<?php

namespace App\Http\Requests\Admin\Location;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStateDetailsRequest extends FormRequest
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
            'js_state_code' => 'required|regex:/^[a-zA-Z\s]+$/u|min:2|max:2',
            'js_state_name' => 'required|regex:/^[a-zA-Z\s]+$/u',
            'js_country_id' => 'required'
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
            'js_state_code.regex' => 'Please enter valid state code.',
            'js_state_name.regex' => 'Please enter valid state name.',
            'js_state_code.min' => 'The state code must not be less than 2 characters.',
            'js_state_code.max' => 'The state code must not be greater than 2 characters.'
        ];
    }
}
