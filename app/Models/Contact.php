<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasHistory;
    protected $fillable = [
        'phone_1',
        'phone_2',
        'phone_3',
        'email_1',
        'email_2',
        'email_3',
        'address',
        'location',
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
