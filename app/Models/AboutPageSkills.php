<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class AboutPageSkills extends Model
{
    use HasHistory;
    protected $fillable = [
        'title',
        'description',
        'text',
        'photo_1',
        'photo_2',
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'text' => 'array',
    ];

    protected $fileFields = [
        'photo_1',
        'photo_2',
    ];

    public function getFileFields(): array
    {
        return $this->fileFields;
    }

}
