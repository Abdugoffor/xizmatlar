<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => $this->password,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}