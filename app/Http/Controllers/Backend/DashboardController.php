<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
class DashboardController extends Controller
{
    public function index()
    {
        if( auth('super_admin')->check() || auth('web')->check() ){
            return view('backend.dashboard');
        }
        else{
            return view("errors.404");
        }
    }


}