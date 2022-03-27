<?php

use App\Http\Controllers\Backend\AppDataModule\Box\BoxController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'box'], function(){

     //index route
     Route::get("/",[BoxController::class,"index"])->name('boxes.all');

     //box update
     Route::post("update",[BoxController::class,"update"])->name('boxes.update');

});

?>