<?php

namespace App\Http\Resources\Banner;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BannerResourceCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\Banner\BannerResource';

    public function toArray($request)
    {
        return[
            'data' => $this->collection
        ];
    }
}
