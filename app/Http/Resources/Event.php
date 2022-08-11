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
            'time' => $this->time,
            'credits' => $this->credits,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'image' => $this->image,
            'completed_at' => $this->completed_at,
            'skills' => EventSkill::collection($this->whenLoaded('event_skill')),
            'users' => User::collection($this->whenLoaded('users')),
            'project' => new Project($this->whenLoaded('project')),
            'group' => new Group($this->whenLoaded('group')),
            'liked_at' => $this->whenPivotLoaded('event_user', function () {
                return $this->pivot->created_at;
            }),
        ];
    }
}
