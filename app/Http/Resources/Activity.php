<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Activity extends JsonResource
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
            'resourceType' => $this->type,
            'name' => $this->name,
            'description' => $this->description,
            'date' => $this->date,
            'time' => $this->time,
            'location' => $this->location,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'image' => $this->image,
            'ticketlink' => $this->ticketlink,
            'user' => new User($this->whenLoaded('user')),
            'users' => User::collection($this->whenLoaded('users')),
            'liked_at' => $this->whenPivotLoaded('activity_user', function () {
                return $this->pivot->created_at;
            }),
        ];
    }
}
