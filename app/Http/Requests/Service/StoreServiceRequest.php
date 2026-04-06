<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'cart_photo' => 'required|file|max:10240',
            'header_photo' => 'required|file|max:10240',
            'content' => 'required|array',
            'video_link' => 'nullable|string|max:255',
            'footer_text' => 'required|array',
            'is_main' => 'required|boolean',
            'is_active' => 'required|boolean',

        ];

        $rules = array_merge(
            $rules,
            validateTranslation('title'),
            validateTranslation('description'),
            validateTranslation('content'),
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
            'cart_photo.file'        => getTranslation('cart photo must be a file'),
            'cart_photo.max'         => getTranslation('cart photo must not exceed 10 MB'),
            'header_photo.file'        => getTranslation('header photo must be a file'),
            'header_photo.max'         => getTranslation('header photo must not exceed 10 MB'),
            'content.required'       => getTranslation('content is required'),
            'content.array'          => getTranslation('content must be an array'),
            'content.*.required'     => getTranslation('content translation is required'),
            'content.*.string'       => getTranslation('content translation must be a string'),
            'video_link.string'    => getTranslation('video link must be a string'),
            'video_link.max'       => getTranslation('video link must not exceed 255 characters'),
            'footer_text.required'       => getTranslation('footer text is required'),
            'footer_text.array'          => getTranslation('footer text must be an array'),
            'footer_text.*.required'     => getTranslation('footer text translation is required'),
            'footer_text.*.string'       => getTranslation('footer text translation must be a string'),
            'is_main.required'   => getTranslation('is main is required'),
            'is_main.boolean'   => getTranslation('is main must be true or false'),
            'is_active.required'   => getTranslation('is active is required'),
            'is_active.boolean'   => getTranslation('is active must be true or false'),

        ];
    }
}
