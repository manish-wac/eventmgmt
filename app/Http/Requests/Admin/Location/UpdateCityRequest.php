<?php

namespace App\Http\Requests\Admin\Location;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
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
            'taluk' => 'required',
            'city' => 'required',
            'country' => 'required|exists:countries,_id',
            'state'   => 'required|exists:states,_id',
            'district' =>  'required|exists:districts,_id',
        ];
    }
}
