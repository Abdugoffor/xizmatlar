<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'description',
        'text',
        'footer_text',
        'photo',
        'video',
        'date',
        'is_main',
        'is_active',
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'text' => 'array',
        'footer_text' => 'array',
        'is_main' => 'boolean',
        'is_active' => 'boolean',
    ];
}
