<?php

namespace App\Http\Resources\ProcessSection;

use Illuminate\Http\Resources\Json\JsonResource;

class ProcessSectionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => getLocale($this->title),
            'description' => getLocale($this->description),
            'photo' => $this->photo,
            'order' => $this->order,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}