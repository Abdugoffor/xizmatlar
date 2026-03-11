<?php

namespace App\Http\Resources\AboutPageSkills;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutPageSkillsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => getLocale($this->title),
            'description' => getLocale($this->description),
            'text' => getLocale($this->text),
            'photo_1' => $this->photo_1,
            'photo_2' => $this->photo_2,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}