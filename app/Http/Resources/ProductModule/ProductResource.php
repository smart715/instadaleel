<?php

namespace App\Http\Resources\ProductModule;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'slug' => $this->slug,
            'price' => $this->price,
            'cover_photo' => asset('images/product/'.$this->cover_photo),
            'year' => $this->year->year,
            'mileage' => $this->mileage,
            'is_feature' => $this->is_feature,
            'url' => route('product.details',[
                'slug' => $this->slug,
                'id' => encrypt($this->id)
            ]),
        ];
    }
}
