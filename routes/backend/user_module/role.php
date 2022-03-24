<?php

use App\Http\Controllers\Backend\UserModule\Role\RoleController;
use Illuminate\Support\Facades\Route;


    //role start
    Route::group(['prefix' => 'role'], function(){
        Route::get("/",[RoleController::class,'index'])->name('role.all');
        Route::get("/data",[RoleController::class,'data'])->name('role.data');
        Route::get("/add",[RoleController::class,'add_modal'])->name('role.add.modal');
        Route::post("/add",[RoleController::class,'add'])->name('role.add');
        Route::get("/edit/{id}",[RoleController::class,'edit'])->name('role.edit');
        Route::post("/update/{id}",[RoleController::class,'update'])->name('role.update');
    });
    //role end


?>