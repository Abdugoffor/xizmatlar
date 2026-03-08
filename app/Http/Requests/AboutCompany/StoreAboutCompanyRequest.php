<?php

namespace App\Http\Requests\AboutCompany;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'section_label' => 'required|array',
            'title' => 'required|array',
            'description' => 'required|array',
            'experience_year' => 'required|integer',
            'experience_text' => 'required|array',
            'experience_photo' => 'required|file|max:10240',
            'block_label1' => 'required|array',
            'block_title1' => 'required|array',
            'block_photo1' => 'required|file|max:10240',
            'block_label2' => 'required|array',
            'block_title2' => 'required|array',
            'block_photo2' => 'required|file|max:10240',
            'founder_name' => 'required|array',
            'founder_position' => 'required|array',
            'founder_photo' => 'required|file|max:10240',
            'main_photo' => 'required|file|max:10240',

        ];

        $rules = array_merge(
            $rules,
            validateTranslation('section_label'),
            validateTranslation('title'),
            validateTranslation('description'),
            validateTranslation('experience_text'),
            validateTranslation('block_label1'),
            validateTranslation('block_title1'),
            validateTranslation('block_label2'),
            validateTranslation('block_title2'),
            validateTranslation('founder_name'),
            validateTranslation('founder_position')
        );

        return $rules;
    }

    public function messages()
    {
        return [
            'section_label.required' => getTranslation('section label is required'),
            'section_label.array' => getTranslation('section label must be an array'),
            'section_label.*.required' => getTranslation('section label translation is required'),
            'section_label.*.string' => getTranslation('section label translation must be a string'),
            'title.required' => getTranslation('title is required'),
            'title.array' => getTranslation('title must be an array'),
            'title.*.required' => getTranslation('title translation is required'),
            'title.*.string' => getTranslation('title translation must be a string'),
            'description.required' => getTranslation('description is required'),
            'description.array' => getTranslation('description must be an array'),
            'description.*.required' => getTranslation('description translation is required'),
            'description.*.string' => getTranslation('description translation must be a string'),
            'experience_year.required' => getTranslation('experience year is required'),
            'experience_year.integer' => getTranslation('experience year must be an integer'),
            'experience_text.required' => getTranslation('experience text is required'),
            'experience_text.array' => getTranslation('experience text must be an array'),
            'experience_text.*.required' => getTranslation('experience text translation is required'),
            'experience_text.*.string' => getTranslation('experience text translation must be a string'),
            'experience_photo.file' => getTranslation('experience photo must be a file'),
            'experience_photo.max' => getTranslation('experience photo must not exceed 10 MB'),
            'block_label1.required' => getTranslation('block label1 is required'),
            'block_label1.array' => getTranslation('block label1 must be an array'),
            'block_label1.*.required' => getTranslation('block label1 translation is required'),
            'block_label1.*.string' => getTranslation('block label1 translation must be a string'),
            'block_title1.required' => getTranslation('block title1 is required'),
            'block_title1.array' => getTranslation('block title1 must be an array'),
            'block_title1.*.required' => getTranslation('block title1 translation is required'),
            'block_title1.*.string' => getTranslation('block title1 translation must be a string'),
            'block_photo1.file' => getTranslation('block photo1 must be a file'),
            'block_photo1.max' => getTranslation('block photo1 must not exceed 10 MB'),
            'block_label2.required' => getTranslation('block label2 is required'),
            'block_label2.array' => getTranslation('block label2 must be an array'),
            'block_label2.*.required' => getTranslation('block label2 translation is required'),
            'block_label2.*.string' => getTranslation('block label2 translation must be a string'),
            'block_title2.required' => getTranslation('block title2 is required'),
            'block_title2.array' => getTranslation('block title2 must be an array'),
            'block_title2.*.required' => getTranslation('block title2 translation is required'),
            'block_title2.*.string' => getTranslation('block title2 translation must be a string'),
            'block_photo2.file' => getTranslation('block photo2 must be a file'),
            'block_photo2.max' => getTranslation('block photo2 must not exceed 10 MB'),
            'founder_name.required' => getTranslation('founder name is required'),
            'founder_name.array' => getTranslation('founder name must be an array'),
            'founder_name.*.required' => getTranslation('founder name translation is required'),
            'founder_name.*.string' => getTranslation('founder name translation must be a string'),
            'founder_position.required' => getTranslation('founder position is required'),
            'founder_position.array' => getTranslation('founder position must be an array'),
            'founder_position.*.required' => getTranslation('founder position translation is required'),
            'founder_position.*.string' => getTranslation('founder position translation must be a string'),
            'founder_photo.file' => getTranslation('founder photo must be a file'),
            'founder_photo.max' => getTranslation('founder photo must not exceed 10 MB'),
            'main_photo.file' => getTranslation('main photo must be a file'),
            'main_photo.max' => getTranslation('main photo must not exceed 10 MB'),

        ];
    }
}