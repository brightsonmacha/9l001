<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'title' => 'required|max:255|unique:posts',
            'body' => 'required',
            'image' => ['required', 'mimes:png,jpg,jepg', 'max:5048']
        ];

        return $rules;
    }
}
