<?php

namespace App\Models\AppDataModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    public function business(){
        return $this->belongsTo(Business::class)->select("id","name","image");
    }
}
