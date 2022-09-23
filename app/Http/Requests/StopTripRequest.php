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
            'trip_id' => 'required',
            'scooter_id' => 'required',
            'endLatitude' => 'required',
            'endLongitude' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'trip_id.required' => 'Scooter ID is Required',
            'scooter_id.required' => 'Scooter ID is Required',
            'endLatitude.required' => 'End Latitude is Required',
            'endLongitude.required' => 'End Longitude is Required',
        ];
    }
}
