<?php

namespace App\Http\Requests\Admin\Location;

use Illuminate\Foundation\Http\FormRequest;

class AddEventRequest extends FormRequest
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
            'title' => 'required',
            'city' => 'required',
            'event_from' => 'required',
            'event_to' => 'required',
            'reg_from' => 'required',
            'reg_to' => 'required',
            'location' => 'required',
            'address' => 'required',
            'country' => 'required|exists:countries,_id',
            'state'   => 'required|exists:states,_id',
            'district' =>  'required|exists:districts,_id',
        ];
    }
}
