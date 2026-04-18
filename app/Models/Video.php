<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'home_video',
    ];

    protected array $fileFields = ['home_video'];

    public function getFileFields(): array
    {
        return $this->fileFields;
    }
}
