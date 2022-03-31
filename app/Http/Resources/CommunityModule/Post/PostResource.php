<?php

namespace App\Http\Resources\CommunityModule\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'customer_data' => [
                'name' => $this->customer->name,
                'image' => $this->customer->image,
            ],
            'description' => $this->description,
            'images' => $this->image ? $this->image : null,
            'total_like' => $this->total_like,
            'total_comment' => $this->total_comment,
            "customer_id" => $this->customer->id,
        ];
    }
}
