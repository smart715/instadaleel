<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//==================== Auth Routes ====================//
Route::group(['prefix' => 'auth'], function () {

	Route::post('register', [AuthController::class, 'register']);
	Route::post('resend-code', [AuthController::class, 'resend_code']);
	Route::post('verify', [AuthController::class, 'verify']);
	Route::post('login', [AuthController::class, 'login']);
	Route::post('logout', [AuthController::class, 'logout']);
	Route::post('refresh', [AuthController::class, 'refresh']);
	Route::post('profile', [AuthController::class, 'profile']);

	//forget password
	Route::post("reset-password",[AuthController::class,"reset_password"]);

});


//banner
Route::get("get-banners",[ApiController::class,"get_banner"]);

//add post
Route::post("add-post",[PostController::class,"add_post"]);


//get post
Route::get("get-post",[PostController::class,"get_post"]);

