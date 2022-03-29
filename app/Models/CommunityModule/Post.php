<?php

namespace App\Models\CommunityModule;

use App\Models\CustomerModule\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function customer(){
        return $this->belongsTo(Customer::class,"customer_id","id");
    }

}
