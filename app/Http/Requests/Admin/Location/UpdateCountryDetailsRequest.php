<?php

namespace App\Http\Requests\Admin\Location;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryDetailsRequest extends FormRequest
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
            'js_update_cn_code' => 'required|regex:/^[a-zA-Z\s]+$/u|min:2|max:3',
            'js_update_cn_name' => 'required|regex:/^[a-zA-Z\s]+$/u',
            'collection_id' => 'required'
        ];
    }
}
