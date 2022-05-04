<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'email' => $this->email,
            'age' => $this->age,
            'description' => $this->description,
            'icon' => $this->icon,
            'email_verified_at' => $this->email_verified_at,
            'credits' => $this->credits,
            'created_at' => $this->created_at,
            'roles' => Role::collection($this->whenLoaded('roles')),
            'users' => User::collection($this->whenLoaded('users')),
            'activities' => Activity::collection($this->whenLoaded('activities')),
            'events' => Event::collection($this->whenLoaded('events')),
            'businesses' => Business::collection($this->whenLoaded('businesses')),
            'accepted' => $this->whenPivotLoaded('event_skill_user', function () {
                return $this->pivot->accepted;
            }),
            'present' => $this->whenPivotLoaded('event_skill_user', function () {
                return $this->pivot->present;
            }),
            'liked_at' => $this->whenPivotLoaded('user_user', function () {
                return $this->pivot->created_at;
            }),
        ];
    }
}
