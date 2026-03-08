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
            'cart_photo' => $this->cart_photo,
            'header_photo' => $this->header_photo,
            'content' => getLocale($this->content),
            'video_link' => $this->video_link,
            'footer_text' => getLocale($this->footer_text),
            'is_main' => $this->is_main,
            'is_active' => $this->is_active,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}