<?php

namespace App\Http\Requests\Admin\Location;

use Illuminate\Foundation\Http\FormRequest;

class AddNewCountryRequest extends FormRequest
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
            'js_country_code' => 'required|regex:/^[a-zA-Z\s]+$/u|min:2|max:2',
            'js_country_name' => 'required|regex:/^[a-zA-Z\s]+$/u'
        ];
    }
}
