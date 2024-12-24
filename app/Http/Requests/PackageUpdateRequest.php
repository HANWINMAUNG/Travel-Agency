<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageUpdateRequest extends FormRequest
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
            'title'=>'required',
            'category' =>'required',
            'date' =>'required',
            'price' =>'required',
            'image'=>'nullable|mimes:png,jpg,jpeg',
            'cover_photo'=>'nullable|mimes:png,jpg,jpeg',
            'description' =>'nullable',
            'summary' =>'nullable',
        ];
    }
}
