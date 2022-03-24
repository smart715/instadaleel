<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;



//live server command route start
Route::get('/db', function(){
    Artisan::call("migrate");
    Artisan::call("db:seed");
    return "success";
});
Route::get('/cache', function(){
    Artisan::call("config:cache");
    Artisan::call("route:clear");
    return "success";
});
//live server command route end


/*
|--------------------------------------------------------------------------
| Backend Routes Start
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    require_once "backend/web.php";
/*
|--------------------------------------------------------------------------
| Backend Routes End
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


