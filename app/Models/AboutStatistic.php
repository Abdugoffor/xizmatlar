<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class AboutStatistic extends Model
{
    use HasHistory;
    protected $fillable = [
        'title',
        'description',
        'text',
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'text' => 'array',
    ];
}
