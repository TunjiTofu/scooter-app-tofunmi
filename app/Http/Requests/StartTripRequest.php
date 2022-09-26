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
            'scooter_id' => 'required|string|max:36',
            'client_id' => 'required|string|max:36',
            'startLatitude' => 'required|numeric|between:-90,90',
            'startLongitude' => 'required|numeric|between:-180,180',
        ];
    }
}
