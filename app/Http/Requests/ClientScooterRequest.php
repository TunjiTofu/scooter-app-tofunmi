<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientScooterRequest extends FormRequest
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
            'radius' => 'required|numeric',
            'clientCurrentLat' => 'required|numeric|between:-90,90',
            'clientCurrentLng' => 'required|numeric|between:-180,180',
        ];
    }

    public function messages()
    {
        return [
            'radius.required' => 'Radius is Required',
            'radius.numeric' => 'Radius must be Numeric',
            'clientCurrentLat.required' => 'Client Current Latitude is Required',
            'clientCurrentLat.numeric' => 'Client Latitude must be Numeric',
            'clientCurrentLng.required' => 'Client Current Longitude is Required',
            'clientCurrentLng.numeric' => 'Client Longitude must be Numeric',
        ];
    }
}