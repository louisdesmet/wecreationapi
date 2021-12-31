<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventSkill extends JsonResource
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
            'paid' => $this->paid,
            'hours' => $this->hours,
            'amount' => $this->amount,
            'skill' => new Skill($this->whenLoaded('skill')),
            'users' => User::collection($this->whenLoaded('users'))
        ];
    }
}
