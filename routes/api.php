<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\BusinessController;
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

	//forget password
	Route::post("reset-password",[AuthController::class,"reset_password"]);

});


Route::group(['middleware' => 'user_active'], function () {

	//profile update
	Route::post('update-profile', [AuthController::class, 'update_profile']);

	//change password
	Route::post('change-password', [AuthController::class, 'change_password']);

	//manage session
	Route::post('manage-session', [AuthController::class, 'manage_session']);

	//banner
	Route::get("get-banners",[ApiController::class,"get_banner"]);

	//get event
	Route::get("get-event",[ApiController::class,"get_event"]);

	//add post
	Route::post("add-post",[PostController::class,"add_post"]);

	//delete post image
	Route::post("delete-post-image",[PostController::class,"delete_post_image"]);

	//update post
	Route::post("update-post",[PostController::class,"update_post"]);

	//delete post
	Route::post("delete-post",[PostController::class,"delete_post"]);

	//get post
	Route::get("get-post",[PostController::class,"get_post"]);

	//post like
	Route::post("post-like",[PostController::class,"post_like"]);

	//post comment
	Route::post("post-comment",[PostController::class,"post_comment"]);

	//comment link
	Route::post("comment-like",[PostController::class,"comment_like"]);

	//get package
	Route::get("get-package",[ApiController::class,"get_package"]);

	//add business
	Route::get("add-business",[BusinessController::class,"add_business"]);

});