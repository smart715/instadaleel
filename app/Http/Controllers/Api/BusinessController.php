<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppDataModule\Business\BusinessResource;
use App\Models\AppDataModule\Business;
use App\Models\AppDataModule\BusinessPackage;
use App\Models\AppDataModule\Package;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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
                "payment_status" => "required|in:Pending,Success,Cancel,Failed",
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

                $code = "B-" . rand(000000,999999);
                $business->code = $code;
                $business->name = $request->name;
                $business->email = $request->email;

                if( $request->image ){
                    $image = $request->file('image');
                    $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();
                    $path = public_path('images/business/'.$img);
                    Image::make($image)->save($path);
                    $business->image = $img;
                }

                $business->address = $request->address;
                $business->contact_number = $request->contact_number;
                $business->short_description = $request->short_description;
                $business->rating = 0;
                
                $social_media_links = [];
                array_push($social_media_links,[
                    'instagram_link' => $request->instagram_link,
                    'twitter_link' => $request->twitter_link,
                    'facebook_link' => $request->facebook_link,
                    'youtube_link' => $request->youtube_link,
                    'telegram_link' => $request->telegram_link,
                ]);
                $business->social_links = json_encode($social_media_links);
                $business->website_link = $request->website_link;
                $business->office_hour = $request->office_hour;
                $business->is_active = false;
                $business->is_pinned = false;
                $business->status = 'Expired';
                $business->month = Carbon::now()->month;
                $business->year = Carbon::now()->year;

                if( $business->save() ){
                    $package = Package::where("id", $request->package_id)->select("id","duration_days","price")->first();
                    $expiry_date = Carbon::now()->addDay($package->duration_days)->toDateString();


                    $business_package = new BusinessPackage();
                    $business_package->business_id = $business->id;
                    $business_package->package_id = $package->id;
                    $business_package->transaction_id = $code;
                    $business_package->total = $package->price;
                    $business_package->payment_status = $request->payment_status;
                    $business_package->expiry_date = $expiry_date;
                    $business_package->status = "Running";

                    if( $business_package->save() ){

                        if( $business_package->payment_status == "Success" ){
                            $business->is_active = true;
                            $business->status = 'Running';
                            $business->save();
                        }

                        return response()->json([
                            'status' => 'success',
                            'data' => 'New business created.'
                        ],200);
                    }

                }


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


    //get_all_business function start
    public function get_all_business(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                "customer_id" => "required|integer|exists:customers,id",
            ]);       

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' => $validator->errors()
                ],200);
            }
            else{
                $business = Business::where("is_active", true)->where("status","Running")
                            ->select("id","name","image","rating","short_description")
                            ->orderBy("id","desc")
                            ->paginate(10);
                
                return response()->json([
                    'status' => 'success',
                    'data' => $business
                ],200);
            }
        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    }
    //get_all_business function end


    //business_details function start
    public function business_details(Request $request){

        try{
            $validator = Validator::make($request->all(),[
                "business_id" => "required|integer|exists:businesses,id",
            ]);       

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' => $validator->errors()
                ],200);
            }
            else{
                $business = Business::where("id", $request->business_id)
                ->select("id","location_id","category_id","name","email","image","address","contact_number","short_description","rating","social_links","website_link","office_hour")
                ->first();

                return response()->json([
                    'status' => 'success',
                    'data' => new BusinessResource($business)
                ],200);

            }

        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    }
    //business_details function end
}
