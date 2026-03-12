<?php

namespace App\Http\Requests\SkillsOption;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSkillsOptionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'title' => 'required|array',
            'progress' => 'required|string|max:255',

        ];

        $rules = array_merge(
            $rules,
            validateTranslation('title')
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
            'progress.required'   => getTranslation('progress is required'),

        ];
    }
}