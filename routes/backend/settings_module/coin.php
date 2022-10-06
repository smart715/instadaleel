<?php

use App\Http\Controllers\Backend\SettingsModule\CoinController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'coin'], function(){

    //index route
    Route::get("/",[CoinController::class,"index"])->name("coin.all");

    //update route start
    Route::post("/update",[CoinController::class,"update"])->name("coin.set");

});

?>