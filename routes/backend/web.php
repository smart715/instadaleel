<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;


//login route start
Route::get('/', [LoginController::class, 'login_show'])->name('login.show');
Route::post('/do-login', [LoginController::class, 'do_login'])->name('do.login');
//login route end


//forget password route start
Route::get('/forget-password', [ForgetPasswordController::class, 'getEmail'])->name('get.email');
Route::post('/forget-password', [ForgetPasswordController::class, 'postEmail'])->name('post.email');
Route::get('reset-password/{token}/{email}', [ForgetPasswordController::class, 'getPassword'])->name('get.password');
Route::post('reset-password/{email}', [ForgetPasswordController::class, 'reset_password'])->name('password.reset');
//forget password route end


//logout route start
Route::post('/do-logout', [LogoutController::class, 'do_logout'])->name('do.logout');
//logout route end

//backend route group start
Route::group(['prefix' => 'admindashboard', 'middleware' => 'auth'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //chart
    Route::get('post-history-chart', [DashboardController::class, 'post_history_chart'])->name('post.history.chart');
    Route::get('business-history-chart', [DashboardController::class, 'business_history_chart'])->name('business.history.chart');

    //profile module routes start
    Route::group(['prefix' => 'profile-module'], function () {
        require_once 'profile_module/profile.php';
    });
    //profile module routes end

    //user module routes start
    Route::group(['prefix' => 'user-module'], function(){
        require_once 'user_module/user.php';
        require_once 'user_module/role.php';
    });
    //user module routes end

    //app data module routes start
    Route::group(['prefix' => 'app-data-module'], function () {
        require_once 'app_data_module/category.php';
        require_once 'app_data_module/country.php';
        require_once 'app_data_module/box.php';
        require_once 'app_data_module/city.php';
        require_once 'app_data_module/event.php';
        require_once 'app_data_module/package.php';
        require_once 'app_data_module/business.php';
        require_once 'app_data_module/offer.php';
    });
    //app data module routes end

    //community module routes start
    Route::group(['prefix' => 'community-module'], function () {
        require_once 'community_module/post.php';
    });
    //community module routes end

    //customer module routes start
    Route::group(['prefix' => 'customer-module'], function () {
        require_once 'customer_module/customer.php';
    });
    //customer module routes end

    //settings module routes start
    Route::group(['prefix' => 'settings-module'], function () {
        require_once 'settings_module/app_info.php';
        require_once 'settings_module/banner.php';
    });
    //settings module routes end

    
});
//backend route group end


?>