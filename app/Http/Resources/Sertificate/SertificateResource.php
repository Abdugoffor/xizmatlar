<?php

namespace App\Http\Resources\Sertificate;

use Illuminate\Http\Resources\Json\JsonResource;

class SertificateResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => getLocale($this->title),
            'file' => $this->file,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}