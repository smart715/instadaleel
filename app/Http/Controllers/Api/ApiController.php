<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Banner\BannerResourceCollection;
use App\Models\AppDataModule\Category;
use App\Models\AppDataModule\Event;
use App\Models\AppDataModule\Package;
use App\Models\SettingsModule\Banner;
use Exception;
use Illuminate\Http\Request;

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

}
