<?php

use App\Http\Controllers\Backend\AppDataModule\Package\PackageController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'package'], function(){

     //index route
     Route::get("",[PackageController::class,"index"])->name("package.all");

     //data route
     Route::get("data",[PackageController::class,"data"])->name("package.data");

     //add route
     Route::get("add-modal",[PackageController::class,"add_modal"])->name("package.add.modal");
     Route::post("add",[PackageController::class,"add"])->name("package.add");

     //edit route
     Route::get("edit-modal/{id}",[PackageController::class,"edit_modal"])->name("package.edit.modal");
     Route::post("edit/{id}",[PackageController::class,"edit"])->name("package.edit");

});

?>