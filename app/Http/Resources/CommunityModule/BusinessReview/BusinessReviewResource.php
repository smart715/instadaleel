<?php

namespace App\Http\Resources\CommunityModule\BusinessReview;

use App\Models\CustomerModule\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessReviewResource extends JsonResource
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
            'customer' => Customer::where("id", $this->customer_id)->select("name","image")->first(),
            'rating' => $this->rating,
            'comment' => $this->comment,
        ];
    }
}
