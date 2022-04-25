<?php

namespace App\Models\AppDatamodule;

use App\Models\AppDataModule\Business;
use App\Models\CustomerModule\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function business(){
        return $this->belongsTo(Business::class);
    }

}
