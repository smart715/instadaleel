<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    //add_business function start
    public function add_business(Request $request){
        try{
            
            
        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    }
    //add_business function end
}
