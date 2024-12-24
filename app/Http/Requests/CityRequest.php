<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
                'package_id' => 'required',
                'cover' =>'nullable|mimes:png,jpg,jpeg',
                'image' =>'nullable|array|max:4',
                'image.*' => 'mimes:png,jpg,jpeg',
                'video' =>'nullable|mimes:mp4,ogx,oga,ogv,ogg,webm|max:90000',
                'summary' =>'nullable',
        ];
    }
}
