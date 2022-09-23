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
            'radius' => 'required',
            'clientCurrentLat' => 'required',
            'clientCurrentLng' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'radius.required' => 'Radius is Required',
            'clientCurrentLat.required' => 'Client Current Latitude is Required',
            'clientCurrentLng.required' => 'Client Current Longitude is Required',
        ];
    }
}
