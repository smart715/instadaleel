<?php

namespace App\Http\Resources\AppDataModule\Event;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EventCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\AppDataModule\Event\EventResource';

    public function toArray($request)
    {
        return[
            'data' => $this->collection
        ];
    }
}
