<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Business extends JsonResource
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
            'type' => $this->type,
            'description' => $this->description,
            'location' => $this->location,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'image' => $this->image,
            'products' => Product::collection($this->whenLoaded('products')),
            'users' => User::collection($this->whenLoaded('users')),
            'liked_at' => $this->whenPivotLoaded('business_user', function () {
                return $this->pivot->created_at;
            }),
        ];
    }
}
