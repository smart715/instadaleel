<?php

use App\Http\Controllers\Backend\SettingsModule\Banner\BannerController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'banner'], function(){

     //index route
     Route::get("/",[BannerController::class,"index"])->name('banner.all');

     //data route
     Route::get("data",[BannerController::class,"data"])->name('banner.data');

     //add route
     Route::get("add-modal",[BannerController::class,"add_modal"])->name('banner.add.modal');
     Route::post("add",[BannerController::class,"add"])->name('banner.add');

     //edit route
     Route::get("edit-modal/{id}",[BannerController::class,"edit_modal"])->name('banner.edit.modal');
     Route::post("edit/{id}",[BannerController::class,"edit"])->name('banner.edit');

     //delete route
     Route::get("delete-modal/{id}",[BannerController::class,"delete_modal"])->name('banner.delete.modal');
     Route::post("delete/{id}",[BannerController::class,"delete"])->name('banner.delete');

     //view route
     Route::get("view-modal/{id}",[BannerController::class,"view_modal"])->name('banner.view.modal');

});

?>