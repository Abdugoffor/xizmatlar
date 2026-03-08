<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'phone_1', 
        'phone_2', 
        'email_1', 
        'email_2', 
        'address', 
        'tlegram', 
        'facebook', 
        'instagram', 
        'watsapp',
        'linked',
        ];

    protected $casts = [
        'address' => 'array',
    ];

}
