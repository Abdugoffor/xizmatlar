<?php

namespace App\Http\Requests\Video;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'home_video' => 'required|file|mimes:mp4,avi,mov,wmv,mkv,webm|max:10240',

        ];


        return $rules;
    }

    public function messages()
    {
        return [
            'home_video.required' => getTranslation('home video is required'),
            'home_video.file' => getTranslation('home video must be a file'),
            'home_video.mimes' => getTranslation('home video must be a video file'),
            'home_video.max' => getTranslation('home video must not exceed 10 MB'),
        ];
    }
}