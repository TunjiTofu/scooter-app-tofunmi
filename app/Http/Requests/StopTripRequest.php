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
            'scooter_id' => 'required|string|max:36',
            'endLatitude' => 'required|numeric|between:-90,90',
            'endLongitude' => 'required|numeric|between:-180,180',
        ];
    }
}
