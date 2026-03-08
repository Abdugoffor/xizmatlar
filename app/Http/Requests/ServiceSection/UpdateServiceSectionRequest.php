<?php

namespace App\Http\Requests\ServiceSection;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceSectionRequest extends FormRequest
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
            'label_1' => 'required|array',
            'text_1' => 'required|array',
            'photo_1' => 'nullable|file|max:10240',
            'label_2' => 'required|array',
            'text_2' => 'required|array',
            'photo_2' => 'nullable|file|max:10240',
            'label_3' => 'required|array',
            'text_3' => 'required|array',
            'photo_3' => 'nullable|file|max:10240',
            'main_photo' => 'nullable|file|max:10240',

        ];

        $rules = array_merge(
            $rules,
            validateTranslation('title'),
                validateTranslation('description'),
                validateTranslation('label_1'),
                validateTranslation('text_1'),
                validateTranslation('label_2'),
                validateTranslation('text_2'),
                validateTranslation('label_3'),
                validateTranslation('text_3')
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
            'label_1.required'       => getTranslation('label 1 is required'),
            'label_1.array'          => getTranslation('label 1 must be an array'),
            'label_1.*.required'     => getTranslation('label 1 translation is required'),
            'label_1.*.string'       => getTranslation('label 1 translation must be a string'),
            'text_1.required'       => getTranslation('text 1 is required'),
            'text_1.array'          => getTranslation('text 1 must be an array'),
            'text_1.*.required'     => getTranslation('text 1 translation is required'),
            'text_1.*.string'       => getTranslation('text 1 translation must be a string'),
            'photo_1.file'        => getTranslation('photo 1 must be a file'),
            'photo_1.max'         => getTranslation('photo 1 must not exceed 10 MB'),
            'label_2.required'       => getTranslation('label 2 is required'),
            'label_2.array'          => getTranslation('label 2 must be an array'),
            'label_2.*.required'     => getTranslation('label 2 translation is required'),
            'label_2.*.string'       => getTranslation('label 2 translation must be a string'),
            'text_2.required'       => getTranslation('text 2 is required'),
            'text_2.array'          => getTranslation('text 2 must be an array'),
            'text_2.*.required'     => getTranslation('text 2 translation is required'),
            'text_2.*.string'       => getTranslation('text 2 translation must be a string'),
            'photo_2.file'        => getTranslation('photo 2 must be a file'),
            'photo_2.max'         => getTranslation('photo 2 must not exceed 10 MB'),
            'label_3.required'       => getTranslation('label 3 is required'),
            'label_3.array'          => getTranslation('label 3 must be an array'),
            'label_3.*.required'     => getTranslation('label 3 translation is required'),
            'label_3.*.string'       => getTranslation('label 3 translation must be a string'),
            'text_3.required'       => getTranslation('text 3 is required'),
            'text_3.array'          => getTranslation('text 3 must be an array'),
            'text_3.*.required'     => getTranslation('text 3 translation is required'),
            'text_3.*.string'       => getTranslation('text 3 translation must be a string'),
            'photo_3.file'        => getTranslation('photo 3 must be a file'),
            'photo_3.max'         => getTranslation('photo 3 must not exceed 10 MB'),
            'main_photo.file'        => getTranslation('main photo must be a file'),
            'main_photo.max'         => getTranslation('main photo must not exceed 10 MB'),

        ];
    }
}