<?php

namespace App\Http\Middleware;

use App\Models\CustomerModule\Customer;
use App\User;
use Closure;

class UserActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth('api')->check() ) {
            $customer = Customer::find(auth('api')->user()->id);
            $customer->last_active = date('Y-m-d H:i:s');
            $customer->save();
            return $next($request);
        } 
        else{
            return response()->json([
                'status' => 'error',
                'data' => 'Unauthenticated user. Token expire'
            ]);
        }
    }
}
