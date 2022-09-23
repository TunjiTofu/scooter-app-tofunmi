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
            'scooter_id' => 'required',
            'client_id' => 'required',
            'startLatitude' => 'required',
            'startLongitude' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'scooter_id.required' => 'Scooter ID is Required',
            'client_id.required' => 'Client ID is Required',
            'startLatitude.required' => 'Start Latitude is Required',
            'startLongitude.required' => 'End Longitude is Required',
        ];
    }
}
