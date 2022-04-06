<?php

namespace App\Http\Resources\AppDataModule\Business;

use App\Models\AppDataModule\Category;
use App\Models\AppDataModule\Location;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
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
            'category' => Category::select("name")->where("id", $this->category_id)->first(),
            'location' => Location::select("name")->where("id",$this->location_id)->first(),
            'name' => $this->name,
            'short_description' => $this->short_description,
            'short_description' => $this->short_description,
            'image' => asset('images/business/'. $this->image),
            'rating' => $this->rating,
            'address' => $this->address,
            'contact_number' => $this->contact_number,
            'website_link' => $this->website_link,
            'email' => $this->email,
            'office_hour' => $this->office_hour,
            'social_links' => json_decode($this->social_links)[0],
        ];
    }
}
