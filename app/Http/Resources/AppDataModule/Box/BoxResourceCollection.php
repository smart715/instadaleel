<?php

namespace App\Http\Resources\AppDataModule\Box;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BoxResourceCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\AppDataModule\Box\BoxResource';

    public function toArray($request)
    {
        return[
            'data' => $this->collection
        ];
    }
}
