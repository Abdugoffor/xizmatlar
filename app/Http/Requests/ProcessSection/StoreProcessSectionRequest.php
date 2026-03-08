<?php

namespace App\Http\Requests\ProcessSection;

use Illuminate\Foundation\Http\FormRequest;

class StoreProcessSectionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'title' => 'required|array',
            'description' => 'required|array',
            'photo' => 'nullable|file|max:10240',
            'order' => 'required|integer',

        ];

        $rules = array_merge(
            $rules,
            validateTranslation('title'),
                validateTranslation('description')
        );

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required'       => getTranslation('title is required'),
            'title.array'          => getTranslation('title must be an array'),
            'title.*.required'     => getTranslation('title translation is required'),
            'title.*.string'       => getTranslation('title translation must be a string'),
            'description.required'       => getTranslation('description is required'),
            'description.array'          => getTranslation('description must be an array'),
            'description.*.required'     => getTranslation('description translation is required'),
            'description.*.string'       => getTranslation('description translation must be a string'),
            'photo.file'        => getTranslation('photo must be a file'),
            'photo.max'         => getTranslation('photo must not exceed 10 MB'),
            'order.required'   => getTranslation('order is required'),
            'order.integer'   => getTranslation('order must be an integer'),

        ];
    }
}