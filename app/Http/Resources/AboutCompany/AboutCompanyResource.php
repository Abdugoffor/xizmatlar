<?php

namespace App\Http\Resources\AboutCompany;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutCompanyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'section_label' => getLocale($this->section_label),
            'title' => getLocale($this->title),
            'description' => getLocale($this->description),
            'experience_year' => $this->experience_year,
            'experience_text' => getLocale($this->experience_text),
            'experience_photo' => $this->experience_photo,
            'block_label1' => getLocale($this->block_label1),
            'block_title1' => getLocale($this->block_title1),
            'block_photo1' => $this->block_photo1,
            'block_label2' => getLocale($this->block_label2),
            'block_title2' => getLocale($this->block_title2),
            'block_photo2' => $this->block_photo2,
            'founder_name' => getLocale($this->founder_name),
            'founder_position' => getLocale($this->founder_position),
            'founder_photo' => $this->founder_photo,
            'main_photo' => $this->main_photo,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}