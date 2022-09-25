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
            'trip_id' => 'required|numeric',
            'scooter_id' => 'required|numeric',
            'endLatitude' => 'required|numeric|between:-90,90',
            'endLongitude' => 'required|numeric|between:-180,180',
        ];
    }

    public function messages()
    {
        return [
            'trip_id.required' => 'Trip ID is Required',
            'trip_id.numeric' => 'Trip ID must be Numeric',
            'scooter_id.required' => 'Scooter ID is Required',
            'scooter_id.numeric' => 'Scooter ID is Numeric',
            'endLatitude.required' => 'End Latitude is Required',
            'endLatitude.numeric' => 'Start Latitude must be Numeric',
            'endLongitude.required' => 'End Longitude is Required',
            'endLongitude.numeric' => 'End Longitude must be Numeric',
        ];
    }
}
