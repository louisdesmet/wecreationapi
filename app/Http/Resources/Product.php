<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'amount' => $this->amount,
            'price' => $this->price,
            'picture' => $this->picture,
            'description' => $this->description,
            'date' => $this->date,
            'start_hour' => $this->start_hour,
            'end_hour' => $this->end_hour,
            'business' => new Business($this->whenLoaded('business'))
        ];
    }
}
