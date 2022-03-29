<?php

namespace App\Http\Resources\CommunityModule\Post;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostResourceCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\CommunityModule\Post\PostResource';

    public function toArray($request)
    {
        return[
            'data' => $this->collection
        ];
    }
}
