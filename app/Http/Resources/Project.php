<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Project extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'credits' => $this->credits,
            'type' => $this->type,
            'picture' => $this->picture,
            'events' => Event::collection($this->whenLoaded('events')),
            'leader' => new User($this->whenLoaded('leader')),
            'created_at' => date($this->created_at)
        ];
    }
}
