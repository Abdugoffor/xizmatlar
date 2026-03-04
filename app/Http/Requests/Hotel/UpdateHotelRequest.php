<?php

namespace App\Http\Requests\Hotel;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelRequest extends FormRequest
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
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'is_active' => 'required|integer',

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
            'latitude.required'   => getTranslation('latitude is required'),
            'latitude.string'    => getTranslation('latitude must be a string'),
            'latitude.max'       => getTranslation('latitude must not exceed 255 characters'),
            'longitude.required'   => getTranslation('longitude is required'),
            'longitude.string'    => getTranslation('longitude must be a string'),
            'longitude.max'       => getTranslation('longitude must not exceed 255 characters'),
            'is_active.required'   => getTranslation('is active is required'),
            'is_active.integer'   => getTranslation('is active must be an integer'),

        ];
    }
}