<?php

namespace App\Http\Resources\Video;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'home_video' => $this->home_video,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}