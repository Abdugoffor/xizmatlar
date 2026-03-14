<?php

namespace App\Http\Requests\Sertificate;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSertificateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'title' => 'required|array',
            'file' => 'nullable|file|max:10240',

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
            'file.file'        => getTranslation('file must be a file'),
            'file.max'         => getTranslation('file must not exceed 10 MB'),

        ];
    }
}