<?php

namespace App\Http\Resources\AppDataModule\Event;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'image' => asset('images/event/'. $this->image),
            'location' => $this->location->name,
            'event_location' => $this->event_location,
            'event_organizer_location' => $this->event_organizer_location,
            'date' => $this->date,
            'time' => $this->time
        ]; 
    }
}
