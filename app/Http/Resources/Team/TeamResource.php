<?php

namespace App\Http\Resources\Team;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => getLocale($this->name),
            'position' => getLocale($this->position),
            'photo' => $this->photo,
            'linked' => $this->linked,
            'telegram' => $this->telegram,
            'watsapp' => $this->watsapp,
            'facebook' => $this->facebook,
            'email' => $this->email,
            'is_active' => $this->is_active,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}