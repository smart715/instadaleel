<?php

namespace App\Http\Resources\CommunityModule\BusinessReview;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BusinessReviewResourceCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\CommunityModule\BusinessReview\BusinessReviewResource';

    public function toArray($request)
    {
        return[
            'data' => $this->collection
        ];
    }
}
