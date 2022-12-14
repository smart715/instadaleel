<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\BusinessController;
use App\Http\Controllers\Api\OfferController;
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

//change password
Route::post('change-password', [AuthController::class, 'change_password']);

Route::group(['middleware' => 'user_active'], function () {

	Route::get('get-profile', [AuthController::class, 'get_profile']);
	//profile update
	Route::post('update-profile', [AuthController::class, 'update_profile']);
	Route::get('get-history', [AuthController::class, 'get_history']);
	//banner
	Route::get("get-banners",[ApiController::class,"get_banner"]);

	//get category
	Route::get("get-categories/{number}",[ApiController::class,"get_categories"]);

	//get sub category
	Route::get("get-sub-categories/{id}",[ApiController::class,"get_sub_categories"]);

	//get boxs
	Route::get("get-boxes",[ApiController::class,"get_boxes"]);

	//box details
	Route::get("box-details",[ApiController::class,"box_details"]);

	//favorite listed
	Route::post("favorite-listed",[ApiController::class,"favorite_listed"]);

	//get favorite
	Route::get("get-favorite",[ApiController::class,"get_favorite"]);

	//manage session
	Route::post('manage-session', [AuthController::class, 'manage_session']);

	//get event
	Route::get("get-event",[ApiController::class,"get_event"]);
	
	//event details
	Route::get("event-details",[ApiController::class,"event_details"]);

	//delete event
	Route::post("delete-event",[ApiController::class,"delete_event"]);

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
	
	//post-details
	Route::get("post-details",[PostController::class,"get_post_details"]);

	//post like
	Route::post("post-like",[PostController::class,"post_like"]);

	//post comment
	Route::post("post-comment",[PostController::class,"post_comment"]);

	//comment link
	Route::post("comment-like",[PostController::class,"comment_like"]);

	//latest post
	Route::get("latest-post",[PostController::class,"latest_post"]);

	//get package
	Route::get("get-package",[ApiController::class,"get_package"]);

	//add business
	Route::post("add-business",[BusinessController::class,"add_business"]);

	//edit business
	Route::post("edit-business",[BusinessController::class,"edit_business"]);

	//get business
	Route::get("get-business/{type}",[BusinessController::class,"get_business"]);

	//get pinned business
	Route::get("get-pinned-business",[BusinessController::class,"get_pinned_business"]);

	//business details
	Route::get("business-details",[BusinessController::class,"business_details"]);

	//business review
	Route::post("add-business-review",[BusinessController::class,"add_business_review"]);

	//get business review
	Route::get("get-business-review",[BusinessController::class,"get_business_review"]);

	//latest review
	Route::get("latest-business-review",[BusinessController::class,"latest_business_review"]);

	//delete business
	Route::post("delete-business",[BusinessController::class,"delete_business"]);

	//add offer
	Route::post("add-offer",[OfferController::class,"add_offer"]);

	//get offer
	Route::get("get-offer",[OfferController::class,"get_offer"]);

	//edit offer
	Route::post("edit-offer",[OfferController::class,"edit_offer"]);

	//delete offer
	Route::post("delete-offer",[OfferController::class,"delete_offer"]);

});