<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessSection extends Model
{
    protected $fillable = ['title', 'description', 'photo', 'order'];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'is_active' => 'boolean',
    ];

    protected $fileFields = ['photo'];

    public function getFileFields(): array
    {
        return $this->fileFields;
    }
}
