<?php

namespace App\Http\Resources\Language;

use Illuminate\Http\Resources\Json\JsonResource;

class LanguageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'is_active' => $this->is_active,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}