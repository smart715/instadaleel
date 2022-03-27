<?php

use App\Http\Controllers\Backend\AppDataModule\Category\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'category'], function(){

     //index route
     Route::get("/",[CategoryController::class,"index"])->name("category.all");

     //data route
     Route::get("data",[CategoryController::class,"data"])->name("category.data");

     //add route
     Route::get("add-modal",[CategoryController::class,"add_modal"])->name("category.add.modal");
     Route::post("add",[CategoryController::class,"add"])->name("category.add");

});

?>