<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppDataModule\Box\BoxResource;
use App\Http\Resources\AppDataModule\Box\BoxResourceCollection;
use App\Http\Resources\Banner\BannerResourceCollection;
use App\Models\AppDataModule\Box;
use App\Models\AppDataModule\Category;
use App\Models\AppDataModule\Event;
use App\Models\AppDataModule\Favourite;
use App\Models\AppDataModule\Package;
use App\Models\SettingsModule\Banner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\AppDataModule\Event\EventResource;

class ApiController extends Controller
{
    
    //get_banner function start
    public function get_banner(){
        try{

            $banner = Banner::where("is_active", true)->orderBy("position","asc")->select("title","image","button_text","link")->get();
            return response()->json([
                'status' => 'success',
                'data' => new BannerResourceCollection($banner)
            ],200);
            
        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    } 
    //get_banner function end


    //get_categories function start
    public function get_categories($number){
        try{
            
            $query = Category::where("is_active", true)->where("category_id", null)->orderBy("position","asc")->select("id","name","icon");
            if( $number == "All" ){
                $categories = $query->get();
            }
            else{
                $categories = $query->take($number)->get();
            }

            return response()->json([
                'status' => 'success',
                'data' => $categories
            ],200);
            
        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    }
    //get_categories function end


    //get_sub_categories function start
    public function get_sub_categories($id){
        try{
            
            $categories = Category::where("is_active", true)->orderBy("position","asc")
                                    ->where("category_id",$id)
                                    ->select("id","name","icon","category_id")
                                    ->get();

            return response()->json([
                'status' => 'success',
                'data' => $categories
            ],200);
            
        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    }
    //get_sub_categories function end


    //get_event function start
    public function get_event(){
        try{

            $event = Event::where("is_active", true)->orderBy('position','asc')
                            ->select("id","title","image","date","time")
                            ->paginate(10);

            return response()->json([
                'status' => 'success',
                'data' => $event
            ],200);
            
        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    }
    //get_event function end
    
    
    //event_details function start
    public function event_details(Request $request){
        try{
    
            $validator = Validator::make($request->all(), [
                "customer_id" => "required|integer|exists:customers,id",
                "event_id" => "required|integer|exists:events,id",
            ]);

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' =>$validator->errors()
                ],200);
            }
            else{
                
                $event = Event::where("is_active", true)->where('id',$request->event_id)->first();
    
                return response()->json([
                    'status' => 'success',
                    'data' => new EventResource($event)
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
    //event_details function end

    //get_package function start
    public function get_package(){
        try{

            $package = Package::where("is_active", true)
                            ->select("id","title","price","duration_days")
                            ->get();

            return response()->json([
                'status' => 'success',
                'data' => $package
            ],200);
            
        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    }
    //get_package function end


    //get_boxes function start
    public function get_boxes(){
        try{
            $boxs = Box::select("id","image","title")->get();

            return response()->json([
                'status' => 'success',
                'data' => new BoxResourceCollection($boxs)
            ],200);
        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    } 
    //get_boxes function end


    //box_details function start
    public function box_details(Request $request){
        try{
            $box = Box::select("description","image","title")->where("id", $request->box_id)->first();

            if( $box ){
                return response()->json([
                    'status' => 'success',
                    'data' => new BoxResource($box)
                ],200);
            }
            else{
                return response()->json([
                    'status' => 'error',
                    'data' => 'No box found'
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
    //box_details function end


    //delete_event function start
    public function delete_event(Request $request){
        try{
            $event = Event::where("id", $request->event_id)->first();

            if( $event ){

                if( File::exists('images/event/'. $event->image) ){
                    File::delete('images/event/'. $event->image);
                }

                if( $event->delete() ){
                    return response()->json([
                        'status' => 'success',
                        'data' => 'Event deleted.'
                    ],200);
                }
                
            }
            else{
                return response()->json([
                    'status' => 'error',
                    'data' => 'No event found'
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
    //delete_event function end


    //favorite_listed function start
    public function favorite_listed(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                "business_id" => "required|integer|exists:businesses,id",
                "customer_id" => "required|integer|exists:customers,id",
            ]);


            if( $validator->fails() ){
                return response()->json([
                    'status' => 'errors',
                    'data' => $validator->errors()
                ],200);
            }
            else{
                $favourite = Favourite::where('business_id', $request->business_id)->where("customer_id", $request->customer_id)->first();

                if( $favourite ){
                    if( $favourite->delete() ){
                        return response()->json([
                            'status' => 'success',
                            'data' => 'Remove From The Favourite list'
                        ],200);
                    }
                }
                else{
                    $favourite = new Favourite();

                    $favourite->business_id = $request->business_id;
                    $favourite->customer_id = $request->customer_id;

                    if( $favourite->save() ){
                        return response()->json([
                            'status' => 'success',
                            'data' => 'Favourite listed'
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
    //favorite_listed function end


    //get_favorite function start
    public function get_favorite(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                "customer_id" => "required|integer|exists:customers,id",
            ]);


            if( $validator->fails() ){
                return response()->json([
                    'status' => 'errors',
                    'data' => $validator->errors()
                ],200);
            }
            else{
                $favourite = Favourite::where("customer_id", $request->customer_id)->select("business_id","id")->with("business")->paginate(10);
                return response()->json([
                    'status' => 'success',
                    'data' => $favourite
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
    //get_favorite function end
}
