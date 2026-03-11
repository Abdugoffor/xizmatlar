<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class AboutPageHeader extends Model
{
    use HasHistory;
    protected $fillable = [
        'title',
        'description',
        'text',
        'experience_text',
        'experience_year',
        'photo_1',
        'photo_2',
        'photo_3',
        'photo_4',
        'ceo_name',
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'text' => 'array',
        'experience_text' => 'array',
    ];

    protected $fileFields = [
        'photo_1',
        'photo_2',
        'photo_3',
        'photo_4',
    ];

    public function getFileFields(): array
    {
        return $this->fileFields;
    }
}
