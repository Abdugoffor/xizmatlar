<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['title', 'description', 'text', 'latitude', 'longitude', 'is_active'];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'text' => 'array',
    ];
}
