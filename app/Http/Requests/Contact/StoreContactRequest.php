<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'phone_1' => 'required|string|max:255',
            'phone_2' => 'required|string|max:255',
            'email_1' => 'required|string|max:255',
            'email_2' => 'required|string|max:255',
            'address' => 'required|array',
            'tlegram' => 'required|string|max:255',
            'facebook' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'watsapp' => 'required|string|max:255',
            'linked' => 'required|string|max:255',

        ];

        $rules = array_merge(
            $rules,
            validateTranslation('address')
        );

        return $rules;
    }

    public function messages()
    {
        return [
            'phone_1.required'   => getTranslation('phone 1 is required'),
            'phone_1.string'    => getTranslation('phone 1 must be a string'),
            'phone_1.max'       => getTranslation('phone 1 must not exceed 255 characters'),
            'phone_2.required'   => getTranslation('phone 2 is required'),
            'phone_2.string'    => getTranslation('phone 2 must be a string'),
            'phone_2.max'       => getTranslation('phone 2 must not exceed 255 characters'),
            'email_1.required'   => getTranslation('email 1 is required'),
            'email_1.string'    => getTranslation('email 1 must be a string'),
            'email_1.max'       => getTranslation('email 1 must not exceed 255 characters'),
            'email_2.required'   => getTranslation('email 2 is required'),
            'email_2.string'    => getTranslation('email 2 must be a string'),
            'email_2.max'       => getTranslation('email 2 must not exceed 255 characters'),
            'address.required'       => getTranslation('address is required'),
            'address.array'          => getTranslation('address must be an array'),
            'address.*.required'     => getTranslation('address translation is required'),
            'address.*.string'       => getTranslation('address translation must be a string'),
            'tlegram.required'   => getTranslation('tlegram is required'),
            'tlegram.string'    => getTranslation('tlegram must be a string'),
            'tlegram.max'       => getTranslation('tlegram must not exceed 255 characters'),
            'facebook.required'   => getTranslation('facebook is required'),
            'facebook.string'    => getTranslation('facebook must be a string'),
            'facebook.max'       => getTranslation('facebook must not exceed 255 characters'),
            'instagram.required'   => getTranslation('instagram is required'),
            'instagram.string'    => getTranslation('instagram must be a string'),
            'instagram.max'       => getTranslation('instagram must not exceed 255 characters'),
            'watsapp.required'   => getTranslation('watsapp is required'),
            'watsapp.string'    => getTranslation('watsapp must be a string'),
            'watsapp.max'       => getTranslation('watsapp must not exceed 255 characters'),
            'linked.required'   => getTranslation('linked is required'),
            'linked.string'    => getTranslation('linked must be a string'),
            'linked.max'       => getTranslation('linked must not exceed 255 characters'),

        ];
    }
}