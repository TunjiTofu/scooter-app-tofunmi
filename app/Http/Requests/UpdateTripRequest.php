<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StopTripRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'scooter_id' => 'required',
            'currentLocation' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'scooter_id.required' => 'Scooter ID is Required',
            'currentLocation.required' => 'End Latitude is Required',
        ];
    }
}
