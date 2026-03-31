<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    use HasHistory;
    protected $fillable = [
        'title',
        'description',
        'label_1',
        'text_1',
        'photo_1',
        'label_2',
        'text_2',
        'photo_2',
        'label_3',
        'text_3',
        'photo_3',
        'main_photo',
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'label_1' => 'array',
        'text_1' => 'array',
        'label_2' => 'array',
        'text_2' => 'array',
        'label_3' => 'array',
        'text_3' => 'array',
    ];

    protected array $fileFields = [
        'photo_1',
        'photo_2',
        'photo_3',
        'main_photo',
    ];

    public function getFileFields(): array
    {
        return $this->fileFields;
    }
}
