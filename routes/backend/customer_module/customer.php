<?php

use App\Http\Controllers\Backend\CustomerModule\Customer\CustomerController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'all-customer'], function(){

     //index route
     Route::get('/',[CustomerController::class,"index"])->name('customer.all');

     //add customer
     Route::get('add-modal',[CustomerController::class,"add_modal"])->name('customer.add.modal');
     Route::post('add',[CustomerController::class,"add"])->name('customer.add');

     //customer view
     Route::get('view-modal/{id}',[CustomerController::class,"view_modal"])->name('customer.view.modal');

     //delete customer
     Route::get('delete-modal/{id}',[CustomerController::class,"delete_modal"])->name('customer.delete.modal');
     Route::post('delete/{id}',[CustomerController::class,"delete"])->name('customer.delete');

});

?>