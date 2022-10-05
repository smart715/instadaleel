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
            'image' => $this->image?asset('images/customer/' . $this->image):NULL,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'nickname' => $this->nickname,
            'nationality' => $this->nationality,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'marital_status' => $this->marital_status,
            'occupation' => $this->occupation,
            'occupation' => $this->occupation,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'is_active' => $this->is_active,
            'is_otp_verified' => $this->is_verified,
            'coin' => $this->coin ?? '0',
            'last_active' => (date('H:i', time()) == Carbon::parse($this->last_active)->format('H:i')) ? 'Online' : Carbon::parse($this->last_active)->diffForHumans()
        ];
    }
}
