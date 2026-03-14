<?php

namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class Sertificate extends Model
{
    use HasHistory;
    protected $fillable = ['title', 'file'];
    protected $casts = [
        'title' => 'array',
    ];

    protected $fileFields = ['file'];

    public function getFileFields(): array
    {
        return $this->fileFields;
    }
}
