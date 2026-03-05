<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "string", "email", "max:255", "unique:users,email," . Auth::id()],
            "password" => ["nullable", "string", "min:8", "confirmed"],
        ];
    }
}
