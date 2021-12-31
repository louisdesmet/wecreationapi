<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
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
            'location' => $this->location,
            'date' => $this->date,
            'credits' => $this->credits,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'skills' => EventSkill::collection($this->whenLoaded('event_skill')),
            'project' => new Project($this->whenLoaded('project'))
        ];
    }
}
