<?php

namespace App\Http\Resources\Service;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => getLocale($this->title),
            'description' => getLocale($this->description),
            'text' => getLocale($this->text),
            'footer_text' => getLocale($this->footer_text),
            'photo' => $this->photo,
            'video' => $this->video,
            'date' => $this->date,
            'order' => $this->order,
            'is_main' => $this->is_main,
            'is_active' => $this->is_active,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}