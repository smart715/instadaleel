<?php

namespace App\Models\AppDataModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function parent(){
        return $this->belongsTo(Location::class,"location_id","id");
    }

}
