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
            'icon' => $this->icon,
            'email_verified_at' => $this->email_verified_at,
            'credits' => $this->credits,
            'hours' => $this->whenPivotLoaded('event_user', function () {
                return $this->pivot->hours;
            }),
            'accepted' => $this->whenPivotLoaded('event_user', function () {
                return $this->pivot->accepted;
            }),
            'present' => $this->whenPivotLoaded('event_user', function () {
                return $this->pivot->present;
            }),
            'hours' => $this->whenPivotLoaded('event_user', function () {
                return $this->pivot->hours;
            }),
            'event_user_id' => $this->whenPivotLoaded('event_user', function () {
                return $this->pivot->id;
            }),
        ];
    }
}
