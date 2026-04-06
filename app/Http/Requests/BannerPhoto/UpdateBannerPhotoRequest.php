<?php

namespace App\Http\Requests\BannerPhoto;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerPhotoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'service_photo' => 'nullable|file|max:10240',
            'blog_photo' => 'nullable|file|max:10240',
            'team_photo' => 'nullable|file|max:10240',
            'contact_photo' => 'nullable|file|max:10240',
            'logo' => 'nullable|file|max:10240',

        ];


        return $rules;
    }

    public function messages()
    {
        return [
            'service_photo.file'        => getTranslation('service photo must be a file'),
            'service_photo.max'         => getTranslation('service photo must not exceed 10 MB'),
            'blog_photo.file'        => getTranslation('blog photo must be a file'),
            'blog_photo.max'         => getTranslation('blog photo must not exceed 10 MB'),
            'team_photo.file'        => getTranslation('team photo must be a file'),
            'team_photo.max'         => getTranslation('team photo must not exceed 10 MB'),
            'contact_photo.file'        => getTranslation('contact photo must be a file'),
            'contact_photo.max'         => getTranslation('contact photo must not exceed 10 MB'),
            'logo.file'        => getTranslation('logo must be a file'),
            'logo.max'         => getTranslation('logo must not exceed 10 MB'),

        ];
    }
}