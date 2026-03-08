<?php

namespace App\Http\Resources\ServiceSection;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceSectionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => getLocale($this->title),
            'description' => getLocale($this->description),
            'label_1' => getLocale($this->label_1),
            'text_1' => getLocale($this->text_1),
            'photo_1' => $this->photo_1,
            'label_2' => getLocale($this->label_2),
            'text_2' => getLocale($this->text_2),
            'photo_2' => $this->photo_2,
            'label_3' => getLocale($this->label_3),
            'text_3' => getLocale($this->text_3),
            'photo_3' => $this->photo_3,
            'main_photo' => $this->main_photo,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}