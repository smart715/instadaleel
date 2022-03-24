<?php

use App\Http\Controllers\Backend\ProfileModule\ProfileController;
use Illuminate\Support\Facades\Route;

//profile management start
Route::group(['prefix' => 'profile'], function () {
    Route::get('/{email}', [ProfileController::class, 'index'])->name('profile.show');
    Route::post('/edit/{id}', [ProfileController::class, 'edit_profile'])->name('profile.edit');
    Route::post('/password/{id}', [ProfileController::class, 'change_password'])->name('profile.password');
});
//profile management end

?>