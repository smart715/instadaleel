<?php

namespace App\Http\Resources\CommunityModule\PostComment;

use Illuminate\Http\Resources\Json\JsonResource;

class PostCommentResource extends JsonResource
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
            'comment' => $this->comment,
            'image' =>  $this->image ? unserialize($this->image) : null,
        ];
    }
}
