<?php

namespace App\Http\Controllers\Backend\SettingsModule;

use App\Http\Controllers\Controller;
use App\Models\SettingsModule\AppInfo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AppInfoController extends Controller
{
    //index function start
    public function index(){
        if( can("app_info") ){
            $app_info = AppInfo::first();
            return view("backend.modules.setting_module.app_info.index", compact("app_info"));
        }
        else{
            return view("errors.403");
        }
    }
    //index function end

    //update function start
    public function update(Request $request, $id){
        if( can("edit_app_info") ){
            try{
                $app_info = AppInfo::find($id);

                if( $request->logo ){
                    if( File::exists('images/info/'. $app_info->logo) ){
                        File::delete('images/info/'. $app_info->logo);
                    }
                    $image = $request->file('logo');
                    $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();
                    $location = public_path('images/info/'.$img);
                    Image::make($image)->save($location);
                    $app_info->logo = $img;
                }

                if( $request->fav ){
                    if( File::exists('images/info/'. $app_info->fav) ){
                        File::delete('images/info/'. $app_info->fav);
                    }
                    $image = $request->file('fav');
                    $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();
                    $location = public_path('images/info/'.$img);
                    Image::make($image)->save($location);
                    $app_info->fav = $img;
                }
                

                if( $app_info->save() ){
                    return response()->json(['success' => 'App Info Updated'], 200);
                }

            }
            catch( Exception $e ){
                return response()->json(['error' => $e->getMessage()], 200);
            }
        }
        else{
            return response()->json(['warning' => unauthorized()], 200);
        }
    }
    //update function end
}
