<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'content' => 'required|array',
            'video_link' => 'required|string|max:255',
            'footer_text' => 'required|array',
            'date' => 'required|date',
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
            'photo.file'        => getTranslation('photo must be a file'),
            'photo.max'         => getTranslation('photo must not exceed 10 MB'),
            'content.required'       => getTranslation('content is required'),
            'content.array'          => getTranslation('content must be an array'),
            'content.*.required'     => getTranslation('content translation is required'),
            'content.*.string'       => getTranslation('content translation must be a string'),
            'video_link.required'   => getTranslation('video link is required'),
            'video_link.string'    => getTranslation('video link must be a string'),
            'video_link.max'       => getTranslation('video link must not exceed 255 characters'),
            'footer_text.required'       => getTranslation('footer text is required'),
            'footer_text.array'          => getTranslation('footer text must be an array'),
            'footer_text.*.required'     => getTranslation('footer text translation is required'),
            'footer_text.*.string'       => getTranslation('footer text translation must be a string'),
            'date.required'   => getTranslation('date is required'),
            'date.date'      => getTranslation('date must be a valid date'),
            'is_active.required'   => getTranslation('is active is required'),
            'is_active.boolean'   => getTranslation('is active must be true or false'),

        ];
    }
}