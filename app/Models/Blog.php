<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'description', 'photo', 'content', 'video_link', 'footer_text', 'date', 'is_active'];
    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'content' => 'array',
        'footer_text' => 'array',
        'is_active' => 'boolean',
    ];

    protected $fileFields = ['photo'];

    public function getFileFields(): array
    {
        return $this->fileFields;
    }
}
