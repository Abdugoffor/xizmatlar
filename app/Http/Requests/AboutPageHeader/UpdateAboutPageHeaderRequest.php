<?php

namespace App\Http\Requests\AboutPageHeader;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutPageHeaderRequest extends FormRequest
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
            'experience_text' => 'required|array',
            'experience_year' => 'required|date',
            'photo_1' => 'nullable|file|max:10240',
            'photo_2' => 'nullable|file|max:10240',
            'photo_3' => 'nullable|file|max:10240',
            'photo_4' => 'nullable|file|max:10240',
            'ceo_name' => 'required|string|max:255',

        ];

        $rules = array_merge(
            $rules,
            validateTranslation('title'),
                validateTranslation('description'),
                validateTranslation('text'),
                validateTranslation('experience_text')
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
            'experience_text.required'       => getTranslation('experience text is required'),
            'experience_text.array'          => getTranslation('experience text must be an array'),
            'experience_text.*.required'     => getTranslation('experience text translation is required'),
            'experience_text.*.string'       => getTranslation('experience text translation must be a string'),
            'experience_year.required'   => getTranslation('experience year is required'),
            'experience_year.date'      => getTranslation('experience year must be a valid date'),
            'photo_1.file'        => getTranslation('photo 1 must be a file'),
            'photo_1.max'         => getTranslation('photo 1 must not exceed 10 MB'),
            'photo_2.file'        => getTranslation('photo 2 must be a file'),
            'photo_2.max'         => getTranslation('photo 2 must not exceed 10 MB'),
            'photo_3.file'        => getTranslation('photo 3 must be a file'),
            'photo_3.max'         => getTranslation('photo 3 must not exceed 10 MB'),
            'photo_4.file'        => getTranslation('photo 4 must be a file'),
            'photo_4.max'         => getTranslation('photo 4 must not exceed 10 MB'),
            'ceo_name.required'   => getTranslation('ceo name is required'),
            'ceo_name.string'    => getTranslation('ceo name must be a string'),
            'ceo_name.max'       => getTranslation('ceo name must not exceed 255 characters'),

        ];
    }
}