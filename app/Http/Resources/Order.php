<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
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
            'accepted' => $this->accepted,
            'created_at' => $this->created_at,
            'product' => new Product($this->whenLoaded('product')),
            'user' => new User($this->whenLoaded('user'))
        ];
    }
}
