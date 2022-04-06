<?php

namespace App\Http\Resources\AppDataModule\Business;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BusinessResourceCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\AppDataModule\Business\BusinessResource';

    public function toArray($request)
    {
        return[
            'data' => $this->collection
        ];
    }
}
