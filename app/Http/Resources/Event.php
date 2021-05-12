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
            'location' => $this->location,
            'date' => $this->date,
            'credits' => $this->credits,
            'skill' => $this->skill,
            'users' => User::collection($this->whenLoaded('users')),
            'project' => new Project($this->whenLoaded('project')),
            'hours' => $this->whenPivotLoaded('event_skill', function () {
                return $this->pivot->hours;
            }),
            'user_id' => $this->whenPivotLoaded('event_skill', function () {
                return $this->pivot->user_id;
            }),
        ];
    }
}
