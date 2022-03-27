<?php

use App\Http\Controllers\Backend\AppDataModule\Category\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'category'], function(){

     //index route
     Route::get("/",[CategoryController::class,"index"])->name("category.all");

     //data route
     Route::get("data/{id}",[CategoryController::class,"data"])->name("category.data");

     //add route
     Route::get("add-modal/{id}",[CategoryController::class,"add_modal"])->name("category.add.modal");
     Route::post("add",[CategoryController::class,"add"])->name("category.add");

     //sub category route
     Route::get("get-sub-category/{id}",[CategoryController::class,"get_sub_category"])->name("get.subcategory");

     //edit route
     Route::get("edit-modal/{id}",[CategoryController::class,"edit_modal"])->name("category.edit.modal");
     Route::post("edit/{id}",[CategoryController::class,"edit"])->name("category.edit");


});

?>