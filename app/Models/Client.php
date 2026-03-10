<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
    use HasHistory;
    protected $fillable = ['title', 'photo', 'is_active'];
    protected $casts = [
        'title' => 'array',
        'is_active' => 'boolean',
    ];

    protected $fileFields = ['photo'];

    public function getFileFields(): array
    {
        return $this->fileFields;
    }
}
