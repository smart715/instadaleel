<?php

namespace App\Models\AppDataModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    public function location(){
        return $this->belongsTo(Location::class);
    }
    
}
