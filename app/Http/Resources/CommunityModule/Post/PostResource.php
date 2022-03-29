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
            'customer' => [
                'name' => $this->customer->name,
                'image' => asset('images/customer/'.$this->customer->image),
            ],
            'description' => $this->description,
            'image' => unserialize($this->image),
            'total_like' => $this->total_like,
            'total_comment' => $this->total_comment,
        ];
    }
}
