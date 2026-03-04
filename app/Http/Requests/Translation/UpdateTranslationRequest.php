<?php

namespace App\Http\Requests\Translation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTranslationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'type' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'name' => 'required|array',

        ];

        $rules = array_merge(
            $rules,
            validateTranslation('name')
        );

        return $rules;
    }

    public function messages()
    {
        return [
            'type.required'   => getTranslation('type is required'),
            'type.string'    => getTranslation('type must be a string'),
            'type.max'       => getTranslation('type must not exceed 255 characters'),
            'slug.required'   => getTranslation('slug is required'),
            'slug.string'    => getTranslation('slug must be a string'),
            'slug.max'       => getTranslation('slug must not exceed 255 characters'),
            'name.required'       => getTranslation('name is required'),
            'name.array'          => getTranslation('name must be an array'),
            'name.*.required'     => getTranslation('name translation is required'),
            'name.*.string'       => getTranslation('name translation must be a string'),

        ];
    }
}