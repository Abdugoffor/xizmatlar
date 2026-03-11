<?php

namespace App\Http\Requests\AboutStatistic;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutStatisticRequest extends FormRequest
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

        ];
    }
}