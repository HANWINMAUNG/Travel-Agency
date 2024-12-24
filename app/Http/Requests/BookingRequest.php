<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'package_id' => 'required',
            'user_id' => 'required',
            'number_of_person' => 'required',
            'note' => 'nullable',
            'phone_number' => 'required',
            'email' => 'required',
            'date_of_travel' => 'required',
            'payment_method' => 'required'
        ];
    }
}
