<?php

use App\Http\Controllers\Backend\AppDataModule\Country\CountryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'country'], function(){

     //index route
     Route::get("/",[CountryController::class,"index"])->name('country.all');

     //data route
     Route::get("data",[CountryController::class,"data"])->name('country.data');

     //add route
     Route::get("add-modal",[CountryController::class,"add_modal"])->name('country.add.modal');
     Route::post("add",[CountryController::class,"add"])->name('country.add');

     //edit route
     Route::get("edit-modal/{id}",[CountryController::class,"edit_modal"])->name('country.edit.modal');
     Route::post("edit/{id}",[CountryController::class,"edit"])->name('country.edit');

     //view route
     Route::get("view-modal/{id}",[CountryController::class,"view_modal"])->name('country.view.modal');
});

?>