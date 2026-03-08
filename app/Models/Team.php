<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name', 
        'position', 
        'photo', 
        'linked', 
        'telegram', 
        'watsapp', 
        'facebook', 
        'email', 
        'is_active',
        ];

    protected $casts = [
        'name' => 'array',
        'position' => 'array',
        'is_active' => 'boolean',
    ];

    protected $fileFields = ['photo'];

    public function getFileFields(): array
    {
        return $this->fileFields;
    }
}
