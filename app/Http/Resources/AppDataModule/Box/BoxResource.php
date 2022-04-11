<?php

namespace App\Http\Resources\AppDataModule\Box;

use Illuminate\Http\Resources\Json\JsonResource;

class BoxResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'image' => asset('images/boxs/'. $this->image),
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}
