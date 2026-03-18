<?php

namespace App\Http\Resources\BannerPhoto;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerPhotoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'service_photo' => $this->service_photo,
            'blog_photo' => $this->blog_photo,
            'team_photo' => $this->team_photo,
            'contact_photo' => $this->contact_photo,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}