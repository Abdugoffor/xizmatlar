<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasHistory;
    protected $fillable = ['slug', 'title', 'description', 'photo', 'content', 'video_link', 'footer_text', 'date', 'is_active'];
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
