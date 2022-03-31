<?php

namespace App\Http\Resources\CustomerModule;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerResourceCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\CustomerModule\CustomerResource';

    public function toArray($request)
    {
        return[
            'data' => $this->collection
        ];
    }
}
