<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasHistory;
    protected $fillable = [
        'slug',
        'title',
        'description',
        'photo',
        'card_photo',
        'content',
        'video_link',
        'footer_text',
        'date',
        'is_active'
    ];
    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'content' => 'array',
        'footer_text' => 'array',
        'date' => 'date',
        'is_active' => 'boolean',
    ];

    protected array $fileFields = ['photo', 'card_photo'];

    public function getFileFields(): array
    {
        return $this->fileFields;
    }
}
