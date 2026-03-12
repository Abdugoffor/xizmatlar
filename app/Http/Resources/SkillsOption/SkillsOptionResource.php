<?php

namespace App\Http\Resources\SkillsOption;

use Illuminate\Http\Resources\Json\JsonResource;

class SkillsOptionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => getLocale($this->title),
            'progress' => $this->progress,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}