<?php

namespace App\Http\Resources\Contact;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'phone_1' => $this->phone_1,
            'phone_2' => $this->phone_2,
            'email_1' => $this->email_1,
            'email_2' => $this->email_2,
            'address' => getLocale($this->address),
            'tlegram' => $this->tlegram,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'watsapp' => $this->watsapp,
            'linked' => $this->linked,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}