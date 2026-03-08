<?php

namespace App\Http\Requests\Team;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|array',
            'position' => 'required|array',
            'photo' => 'nullable|file|max:10240',
            'linked' => 'required|string|max:255',
            'telegram' => 'required|string|max:255',
            'watsapp' => 'required|string|max:255',
            'facebook' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'is_active' => 'required|boolean',

        ];

        $rules = array_merge(
            $rules,
            validateTranslation('name'),
                validateTranslation('position')
        );

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'       => getTranslation('name is required'),
            'name.array'          => getTranslation('name must be an array'),
            'name.*.required'     => getTranslation('name translation is required'),
            'name.*.string'       => getTranslation('name translation must be a string'),
            'position.required'       => getTranslation('position is required'),
            'position.array'          => getTranslation('position must be an array'),
            'position.*.required'     => getTranslation('position translation is required'),
            'position.*.string'       => getTranslation('position translation must be a string'),
            'photo.file'        => getTranslation('photo must be a file'),
            'photo.max'         => getTranslation('photo must not exceed 10 MB'),
            'linked.required'   => getTranslation('linked is required'),
            'linked.string'    => getTranslation('linked must be a string'),
            'linked.max'       => getTranslation('linked must not exceed 255 characters'),
            'telegram.required'   => getTranslation('telegram is required'),
            'telegram.string'    => getTranslation('telegram must be a string'),
            'telegram.max'       => getTranslation('telegram must not exceed 255 characters'),
            'watsapp.required'   => getTranslation('watsapp is required'),
            'watsapp.string'    => getTranslation('watsapp must be a string'),
            'watsapp.max'       => getTranslation('watsapp must not exceed 255 characters'),
            'facebook.required'   => getTranslation('facebook is required'),
            'facebook.string'    => getTranslation('facebook must be a string'),
            'facebook.max'       => getTranslation('facebook must not exceed 255 characters'),
            'email.required'   => getTranslation('email is required'),
            'email.string'    => getTranslation('email must be a string'),
            'email.max'       => getTranslation('email must not exceed 255 characters'),
            'email.email'     => getTranslation('email must be a valid email'),
            'is_active.required'   => getTranslation('is active is required'),
            'is_active.boolean'   => getTranslation('is active must be true or false'),

        ];
    }
}