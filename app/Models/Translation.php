<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasHistory;
    protected $fillable = ['type', 'slug', 'name'];

    protected $casts = [
        'name' => 'array',
    ];
}
