<?php

use App\Http\Controllers\Backend\AppDataModule\City\CityController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'city'], function(){

     //index route
     Route::get("/",[CityController::class,"index"])->name("city.all");

     //data route
     Route::get("data",[CityController::class,"data"])->name("city.data");

     //add route
     Route::get("add-modal",[CityController::class,"add_modal"])->name("city.add.modal");
     Route::post("add",[CityController::class,"add"])->name("city.add");

     //edit route
     Route::get("edit-modal/{id}",[CityController::class,"edit_modal"])->name("city.edit.modal");
     Route::post("edit/{id}",[CityController::class,"edit"])->name("city.edit");

     //view route
     Route::get("view-modal/{id}",[CityController::class,"view_modal"])->name("city.view.modal");
});

?>