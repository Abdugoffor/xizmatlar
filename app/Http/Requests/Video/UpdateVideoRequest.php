<?php

namespace App\Http\Requests\Video;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVideoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'home_video' => 'nullable|file|mimes:mp4,avi,mov,wmv,mkv,webm|max:10240',
        ];
    }

    public function messages()
    {
        return [
            'home_video.file' => getTranslation('home video must be a file'),
            'home_video.mimes' => getTranslation('home video must be a video file'),
            'home_video.max' => getTranslation('home video must not exceed 10 MB'),
        ];
    }
}