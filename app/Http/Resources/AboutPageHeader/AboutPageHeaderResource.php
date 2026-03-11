<?php

namespace App\Http\Resources\AboutPageHeader;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutPageHeaderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => getLocale($this->title),
            'description' => getLocale($this->description),
            'text' => getLocale($this->text),
            'experience_text' => getLocale($this->experience_text),
            'experience_year' => $this->experience_year,
            'photo_1' => $this->photo_1,
            'photo_2' => $this->photo_2,
            'photo_3' => $this->photo_3,
            'photo_4' => $this->photo_4,
            'ceo_name' => $this->ceo_name,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}