<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Visitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth('visitor')->check() ) {

            if( auth('visitor')->user()->is_verified == true && auth('visitor')->user()->is_active == true ){
                return $next($request);
            }
            else{
                auth('visitor')->logout();
                return redirect()->route('register','dealer');
            }
        } 
        else {
            auth('visitor')->logout();
            return redirect()->route('register','dealer');
        }
    }
}
