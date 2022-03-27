<?php

namespace App\Models\AppDataModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    //children
    public function categories(){
        return $this->hasMany(Category::class,"category_id","id");
    }
    public function childrenCategories(){
        return $this->categories()->with('childrenCategories');
    }

    public function parent(){
        return $this->belongsTo(Category::class,"category_id","id");
    }

}
