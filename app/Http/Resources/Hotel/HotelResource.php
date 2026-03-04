<?php

namespace App\Http\Resources\Hotel;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => getLocale($this->title),
            'description' => getLocale($this->description),
            'text' => getLocale($this->text),
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'is_active' => $this->is_active,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}