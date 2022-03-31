<?php

namespace App\Http\Resources\CustomerModule;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => asset('images/customer/'.$this->image),
            'phone' => $this->phone ,
            'email' => $this->email ,
            'address' => $this->address,
            'gender' => $this->gender,
            'about' => $this->about,
            'occupation' => $this->occupation,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'occupation' => $this->occupation,
            'is_active' => $this->is_active,
            'is_otp_verified' => $this->is_verified,
            'last_active' => ( date('H:i', time()) == Carbon::parse($this->last_active)->format('H:i') ) ? 'Online' : Carbon::parse($this->last_active)->diffForHumans()
        ];
    }
}
