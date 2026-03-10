<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasHistory;
    protected $fillable = [
        'title',
        'description',
        'cart_photo',
        'header_photo',
        'content',
        'video_link',
        'footer_text',
        'is_main',
        'is_active',
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'content' => 'array',
        'footer_text' => 'array',
        'is_main' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected $fileFields = [
        'cart_photo',
        'header_photo',
    ];

    public function getFileFields(): array
    {
        return $this->fileFields;
    }
}
