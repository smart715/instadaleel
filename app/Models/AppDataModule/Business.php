<?php

namespace App\Models\AppDataModule;

use App\Models\CustomerModule\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }
}
