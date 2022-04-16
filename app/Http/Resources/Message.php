<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Message extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'message' => $this->message,
            'created_at' => $this->created_at,
            'notification' => $this->notification,
            'user' => new User($this->whenLoaded('user')),
            'recipient' => new User($this->whenLoaded('recipient')),
            'group' => new Group($this->whenLoaded('group'))
        ];
    }
}
