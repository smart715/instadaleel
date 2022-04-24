<?php

use App\Http\Controllers\Backend\AppDataModule\Business\BusinessController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'business'], function(){

     //index
     Route::get("/",[BusinessController::class,"index"])->name("business.all");

     //edit modal
     Route::get("edit-modal/{id}",[BusinessController::class,"edit_modal"])->name("business.edit.modal");
     Route::post("edit/{id}",[BusinessController::class,"edit"])->name("business.edit");

     //delete modal
     Route::get("delete-modal/{id}",[BusinessController::class,"delete_modal"])->name("business.delete.modal");
     Route::post("delete/{id}",[BusinessController::class,"delete"])->name("business.delete");

     //view modal
     Route::get("view-modal/{id}",[BusinessController::class,"view_modal"])->name("business.view.modal");

});

?>