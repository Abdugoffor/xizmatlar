<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class SkillsOption extends Model
{
    use HasHistory;
    protected $fillable = [
        'title',
        'progress',
    ];
    protected $casts = [
        'title' => 'array',
        'progress' => 'integer',
    ];

}
