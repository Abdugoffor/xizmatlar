<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutCompany extends Model
{
    protected $fillable = [
        'section_label',
        'title',
        'description',
        'experience_year',
        'experience_text',
        'experience_photo',
        'block_label1',
        'block_title1',
        'block_photo1',
        'block_label2',
        'block_title2',
        'block_photo2',
        'founder_name',
        'founder_position',
        'founder_photo',
        'main_photo',
    ];

    protected $casts = [
        'section_label' => 'array',
        'title' => 'array',
        'description' => 'array',
        'experience_text' => 'array',
        'block_label1' => 'array',
        'block_title1' => 'array',
        'block_label2' => 'array',
        'block_title2' => 'array',
        'founder_name' => 'array',
        'founder_position' => 'array',
    ];

    protected $fileFields = [
        'experience_photo',
        'block_photo1',
        'block_photo2',
        'founder_photo',
        'main_photo',
    ];

    public function getFileFields(): array
    {
        return $this->fileFields;
    }
}
