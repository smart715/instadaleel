<?php

use App\Http\Controllers\Backend\CommunityModule\Post\PostController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'post'], function(){
    
     //index route
     Route::get("/",[PostController::class,"index"])->name('post.all');

     //edit route
     Route::get("edit-modal/{id}",[PostController::class,"edit_modal"])->name('post.edit.modal');
     Route::post("edit/{id}",[PostController::class,"edit"])->name('post.edit');

     //delete modal
     Route::get("delete-modal/{id}",[PostController::class,"delete_modal"])->name("post.delete.modal");
     Route::post("delete/{id}",[PostController::class,"delete"])->name("post.delete");

     //view route
     Route::get("view-modal/{id}",[PostController::class,"view_modal"])->name('post.view.modal');

});

?>