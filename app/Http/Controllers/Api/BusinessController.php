<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppDataModule\Business;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{
    //add_business function start
    public function add_business(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                "customer_id" => "required|integer|exists:customers,id",
                "location_id" => "required|integer|exists:locations,id",
                "category_id" => "required|integer|exists:categories,id",
                "package_id" => "required|integer|exists:packages,id",
                "name" => "required",
                "email" => "required",
                "image" => "required",
                "address" => "required",
                "contact_number" => "required",
                "short_description" => "required",
                "website_link" => "required",
                "office_hour" => "required",
            ]);       

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' => $validator->errors()
                ],200);
            }
            else{
                $business = new Business();

                $business->customer_id = $request->customer_id;
                $business->location_id = $request->location_id;
                $business->category_id = $request->category_id;
                $business->package_id = $request->package_id;
                $business->package_id = $request->package_id;

            }

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
