<?php

namespace App\Http\Resources\AboutStatistic;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutStatisticResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => getLocale($this->title),
            'description' => getLocale($this->description),
            'text' => getLocale($this->text),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}