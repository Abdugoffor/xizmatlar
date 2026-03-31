<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    
    use HasHistory;
    protected $fillable = ['title', 'description', 'photo', 'is_active'];
    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'is_active' => 'boolean',
    ];

    protected array $fileFields = ['photo'];

    public function getFileFields(): array
    {
        return $this->fileFields;
    }
}