<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class BannerPhoto extends Model
{
    use HasHistory;
    protected $fillable = [
        'service_photo',
        'blog_photo',
        'team_photo',
        'contact_photo',
        'logo',
    ];

    protected array $fileFields = ['service_photo','blog_photo','team_photo','contact_photo','logo'];

    public function getFileFields(): array
    {
        return $this->fileFields;
    }
}
