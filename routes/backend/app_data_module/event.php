<?php

use App\Http\Controllers\Backend\AppDataModule\Event\EventController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'event'], function(){

     //index route
     Route::get("/",[EventController::class,"index"])->name("event.all");

     //data route
     Route::get("data",[EventController::class,"data"])->name("event.data");

     //add route
     Route::get("add-modal",[EventController::class,"add_modal"])->name("event.add.modal");
     Route::post("add",[EventController::class,"add"])->name("event.add");

     //edit route
     Route::get("edit-modal/{id}",[EventController::class,"edit_modal"])->name("event.edit.modal");
     Route::post("edit/{id}",[EventController::class,"edit"])->name("event.edit");

     //delete route
     Route::get("delete-modal/{id}",[EventController::class,"delete_modal"])->name("event.delete.modal");
     Route::post("delete/{id}",[EventController::class,"delete"])->name("event.delete");

});

?>