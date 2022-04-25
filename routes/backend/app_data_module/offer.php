<?php

use App\Http\Controllers\Backend\AppDataModule\Offer\OfferController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'offer'], function(){

     //index route
     Route::get("/",[OfferController::class,"index"])->name("offer.all");

     //edit modal
     Route::get("edit-modal/{id}",[OfferController::class,"edit_modal"])->name("offer.edit.modal");
     Route::post("edit/{id}",[OfferController::class,"edit"])->name("offer.edit");

     //delete modal
     Route::get("delete-modal/{id}",[OfferController::class,"delete_modal"])->name("offer.delete.modal");
     Route::post("delete/{id}",[OfferController::class,"delete"])->name("offer.delete");

     //view modal
     Route::get("view-modal/{id}",[OfferController::class,"view_modal"])->name("offer.view.modal");

});

?>