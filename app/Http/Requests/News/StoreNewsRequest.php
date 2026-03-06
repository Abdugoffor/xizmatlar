<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            'footer_text' => 'required|array',
            'photo' => 'required|string|max:255',
            'video' => 'required|string|max:255',
            'date' => 'required|date',
            'is_main' => 'required|boolean',
            'is_active' => 'required|boolean',

        ];

        $rules = array_merge(
            $rules,
            validateTranslation('title'),
                validateTranslation('description'),
                validateTranslation('text'),
                validateTranslation('footer_text')
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
            'footer_text.required'       => getTranslation('footer text is required'),
            'footer_text.array'          => getTranslation('footer text must be an array'),
            'footer_text.*.required'     => getTranslation('footer text translation is required'),
            'footer_text.*.string'       => getTranslation('footer text translation must be a string'),
            'photo.required'   => getTranslation('photo is required'),
            'photo.string'    => getTranslation('photo must be a string'),
            'photo.max'       => getTranslation('photo must not exceed 255 characters'),
            'video.required'   => getTranslation('video is required'),
            'video.string'    => getTranslation('video must be a string'),
            'video.max'       => getTranslation('video must not exceed 255 characters'),
            'date.required'   => getTranslation('date is required'),
            'date.date'      => getTranslation('date must be a valid date'),
            'is_main.required'   => getTranslation('is main is required'),
            'is_main.boolean'   => getTranslation('is main must be true or false'),
            'is_active.required'   => getTranslation('is active is required'),
            'is_active.boolean'   => getTranslation('is active must be true or false'),

        ];
    }
}