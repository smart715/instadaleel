<?php

use App\Http\Controllers\Backend\UserModule\User\UserCoverageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserModule\User\UserController;
use App\Http\Controllers\Backend\UserModule\User\UserDebitCreditController;

//user start 
    Route::group(['prefix' => 'user'], function(){
        Route::get("/",[UserController::class,'index'])->name('user.all');
        Route::get("/data",[UserController::class,'data'])->name('user.data');

        //user add
        Route::get("/add",[UserController::class,'add_modal'])->name('user.add.modal');
        Route::post("/add",[UserController::class,'add'])->name('user.add');

        //user edit
        Route::get("/edit/{id}",[UserController::class,'edit'])->name('user.edit');
        Route::post("/edit/{id}",[UserController::class,'update'])->name('user.update');

        //password reset
        Route::get("/reset/modal/{id}",[UserController::class,'reset_modal'])->name('user.reset.modal');
        Route::post("/reset/{id}",[UserController::class,'reset'])->name('user.reset');

        //debit credit
        Route::get("/debit/credit/{id}",[UserDebitCreditController::class,'debit_credit_modal'])->name('user.debit.credit.modal');
        Route::post("/debit/credit/{id}",[UserDebitCreditController::class,'debit_credit_add'])->name('user.debit.credit.add');

        //view user
        Route::get("/view/{email}",[UserCoverageController::class,'user_view'])->name('user.view');
        Route::get("/view/data/{email}",[UserCoverageController::class,'user_view_data'])->name('user.view.data');

        //coverage add
        Route::get("/view/user/add/coverage/{email}",[UserCoverageController::class,"user_coverage_add_modal"])->name("user.coverage.add.modal");
        Route::post("/view/user/add/coverage/{email}",[UserCoverageController::class,"user_coverage_add"])->name("user.coverage.add");
        
        //coverage edit
        Route::get("/view/user/edit/coverage/{id}",[UserCoverageController::class,"user_coverage_edit_modal"])->name("user.coverage.edit.modal");
        Route::post("/view/user/update/coverage/{id}",[UserCoverageController::class,"user_coverage_update"])->name("user.coverage.update");

        //coverage delete
        Route::get("/view/user/delete/coverage/modal/{id}",[UserCoverageController::class,"user_coverage_delete_modal"])->name("user.coverage.delete.modal");
        Route::post("/view/user/delete/coverage/{id}",[UserCoverageController::class,"user_coverage_delete"])->name("user.coverage.delete");
    }); 
    //user end


?>