<?php

use App\Http\Controllers\Backend\SettingsModule\AppInfoController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'app_info'], function(){

    //index route
    Route::get("/",[AppInfoController::class,"index"])->name("app.info.all");

    //update route start
    Route::post("/update/{id}",[AppInfoController::class,"update"])->name("app.info.update");

});

?>