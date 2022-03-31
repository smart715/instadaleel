<?php

namespace App\Models\CommunityModule;

use App\Models\CustomerModule\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'image' => 'object',
    ];

    public function customer_data(){
        return $this->belongsTo(Customer::class,"customer_id","id")->select("id","name","image");
    }

    public function customer(){
        return $this->belongsTo(Customer::class,"customer_id","id");
    }
}
