<?php

namespace App\Http\Resources\CommunityModule\PostComment;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCommentResourceCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\CommunityModule\PostComment\PostCommentResource';

    public function toArray($request)
    {
        return[
            'data' => $this->collection
        ];
    }
}
