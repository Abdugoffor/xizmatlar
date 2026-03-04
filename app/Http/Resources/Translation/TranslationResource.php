<?php

namespace App\Http\Resources\Translation;

use Illuminate\Http\Resources\Json\JsonResource;

class TranslationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'type' => $this->type,
            'slug' => $this->slug,
            'name' => getLocale($this->name),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}