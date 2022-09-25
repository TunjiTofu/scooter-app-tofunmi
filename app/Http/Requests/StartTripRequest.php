<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StartTripRequest extends FormRequest
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
            'scooter_id' => 'required|numeric',
            'client_id' => 'required|numeric',
            'startLatitude' => 'required|numeric|between:-90,90',
            'startLongitude' => 'required|numeric|between:-180,180',
        ];
    }

    public function messages()
    {
        return[
            'scooter_id.required' => 'Scooter ID is Required',
            'scooter_id.numeric' => 'Scooter ID must be Numeric',
            'client_id.required' => 'Client ID is Required',
            'client_id.numeric' => 'Client ID must be Numeric',
            'startLatitude.required' => 'Start Latitude is Required',
            'startLatitude.numeric' => 'Start Latitude must be Numeric',
            'startLongitude.required' => 'End Longitude is Required',
            'startLongitude.numeric' => 'End Longitude must be Numeric',
        ];
    }
}
