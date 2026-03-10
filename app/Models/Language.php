<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasHistory;
    protected $fillable = ['name','is_active'];
}
