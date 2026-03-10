<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class ProcessSection extends Model
{
    use HasHistory;
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
