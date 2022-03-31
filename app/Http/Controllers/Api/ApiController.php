<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Banner\BannerResourceCollection;
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

}
