<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth('super_admin')->check()) {
            return $next($request);
        } 
        elseif( auth('web')->check()  ){
            if(auth('web')->user()->role->is_active == true){
                return $next($request);
            }
            else {
                Auth::logout();
                return redirect()->route('login.show');
            }
        }
        else {

            return redirect()->route('login.show');
        }
    }
}