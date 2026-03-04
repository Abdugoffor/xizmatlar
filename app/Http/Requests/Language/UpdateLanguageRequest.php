<?php

namespace App\Http\Requests\Language;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLanguageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'is_active' => 'required|integer',

        ];


        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'   => getTranslation('name is required'),
            'name.string'    => getTranslation('name must be a string'),
            'name.max'       => getTranslation('name must not exceed 255 characters'),
            'is_active.required'   => getTranslation('is active is required'),
            'is_active.integer'   => getTranslation('is active must be an integer'),

        ];
    }
}