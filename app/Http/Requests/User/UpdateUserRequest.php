<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'role' => 'required|in:user,admin',
            'password' => 'required|string|max:255',

        ];


        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'   => getTranslation('name is required'),
            'name.string'    => getTranslation('name must be a string'),
            'name.max'       => getTranslation('name must not exceed 255 characters'),
            'email.required'   => getTranslation('email is required'),
            'email.string'    => getTranslation('email must be a string'),
            'email.max'       => getTranslation('email must not exceed 255 characters'),
            'email.email'     => getTranslation('email must be a valid email'),
            'role.required'   => getTranslation('role is required'),
            'role.string'    => getTranslation('role must be a string'),
            'role.max'       => getTranslation('role must not exceed 255 characters'),
            'role.in'        => getTranslation('role has an invalid value'),
            'password.required'   => getTranslation('password is required'),
            'password.string'    => getTranslation('password must be a string'),
            'password.max'       => getTranslation('password must not exceed 255 characters'),

        ];
    }
}