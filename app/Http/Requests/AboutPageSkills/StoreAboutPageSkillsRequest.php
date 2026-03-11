<?php

namespace App\Http\Requests\AboutPageSkills;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutPageSkillsRequest extends FormRequest
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
            'text' => 'required|array',
            'photo_1' => 'nullable|file|max:10240',
            'photo_2' => 'nullable|file|max:10240',

        ];

        $rules = array_merge(
            $rules,
            validateTranslation('title'),
                validateTranslation('description'),
                validateTranslation('text')
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
            'text.required'       => getTranslation('text is required'),
            'text.array'          => getTranslation('text must be an array'),
            'text.*.required'     => getTranslation('text translation is required'),
            'text.*.string'       => getTranslation('text translation must be a string'),
            'photo_1.file'        => getTranslation('photo 1 must be a file'),
            'photo_1.max'         => getTranslation('photo 1 must not exceed 10 MB'),
            'photo_2.file'        => getTranslation('photo 2 must be a file'),
            'photo_2.max'         => getTranslation('photo 2 must not exceed 10 MB'),

        ];
    }
}