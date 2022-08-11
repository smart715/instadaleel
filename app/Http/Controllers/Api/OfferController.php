<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppDatamodule\Offer;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class OfferController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['get_offer']]);
    }
    
    //add_offer function start
    public function add_offer(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                "title" => "required",
                "image" => "required",
                "description" => "required",
                "customer_id" => "required|integer|exists:customers,id",
                "business_id" => "required|integer|exists:businesses,id",
            ]);

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' => $validator->errors()
                ],200);
            }
            else{
                $offer = new Offer();

                $max = Offer::max("position");
                
                $offer->position = $max ? ($max + 1) : 1;
                $offer->title = $request->title;

                if( $request->image ){
                    $image = $request->file('image');
                    $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();
                    $path = public_path('images/offer/'.$img);
                    Image::make($image)->save($path);
                    $offer->image = $img;
                }

                $offer->description = $request->description;
                $offer->customer_id = $request->customer_id;
                $offer->business_id = $request->business_id;
                $offer->is_approved = false;
                $offer->is_active = true;
                $offer->month = Carbon::now()->month;
                $offer->year = Carbon::now()->year;

                if( $offer->save() ){
                    return response()->json([
                        'status' => 'success',
                        'data' => 'New offer created'
                    ],200);
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
    //add_offer function end


    //get_offer function start
    public function get_offer(Request $request){
        try{
            $offer = Offer::orderBy("position","asc")->where("is_approved", true)->where("is_active", true)
                            ->select("id","title","description","image")
                            ->paginate(10);
            
            return response()->json([
                'status' => 'success',
                'data' => $offer
            ],200);
        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    }
    //get_offer function end


    //edit_offer function start
    public function edit_offer(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                "title" => "required",
                "description" => "required",
                "customer_id" => "required|integer|exists:customers,id",
                "business_id" => "required|integer|exists:businesses,id",
                "offer_id" => "required|integer|exists:offers,id",
            ]);

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' => $validator->errors()
                ],200);
            }
            else{
                $offer = Offer::find($request->offer_id);

                $offer->title = $request->title;

                if( $request->image ){
                    if( File::exists('images/offer/'. $offer->image) ){
                        File::delete('images/offer/'. $offer->image);
                    }
                    $image = $request->file('image');
                    $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();
                    $path = public_path('images/offer/'.$img);
                    Image::make($image)->save($path);
                    $offer->image = $img;
                }

                $offer->description = $request->description;
                $offer->customer_id = $request->customer_id;
                $offer->business_id = $request->business_id;

                if( $offer->save() ){
                    return response()->json([
                        'status' => 'success',
                        'data' => 'Offer updated'
                    ],200);
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
    //edit_offer function end


    //delete_offer function start
    public function delete_offer(Request $request){
        try{
            $offer = Offer::where("id", $request->offer_id)->first();

            if( $offer ){
                if( File::exists('images/offer/'. $offer->image) ){
                    File::delete('images/offer/'. $offer->image);
                }

                if( $offer->delete() ){
                    return response()->json([
                        'status' => 'success',
                        'data' => 'Offer Deleted'
                    ],200);
                }
            }
            else{
                return response()->json([
                    'status' => 'error',
                    'data' => 'No offer found'
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
    //delete_offer function end

}
