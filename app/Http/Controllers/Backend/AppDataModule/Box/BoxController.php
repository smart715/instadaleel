<?php

namespace App\Http\Controllers\Backend\AppDataModule\Box;

use App\Http\Controllers\Controller;
use App\Models\AppDataModule\Box;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BoxController extends Controller
{
    //index function start
    public function index(){
        try{
            if( can("boxes") ){
                $boxs = Box::select("id","image","title","description")->get();

                return view("backend.modules.app_data_module.box.index", compact('boxs'));
            }
            else{
                return view("errors.404");
            }
        }
        catch( Exception $e ){
            return back()->with('warning', $e->getMessage());
        }
    }
    //index function end


    //update function start
    public function update(Request $request){
        try{
            if( can("edit_boxes") ){
                $validator = Validator::make($request->all(),[
                    "title.*" => "required",
                    "description.*" => "required",
                ]);

                if( $validator->fails() ){
                    return response()->json(['errors' => $validator->errors()],422);
                }
                else{

                    for( $i = 0 ; $i < 2 ; $i++ ){
                        $id = $i+1;
                        $box = Box::find($id);

                        $box->title = $request->title[$i];
                        $box->description = $request->description[$i];

                        if( isset($request->image[$i]) ){
                            if( File::exists('images/boxs/'. $box->image) ){
                                File::delete('images/boxs/'. $box->image);
                            }

                            $image = $request->file('image')[$i];
                            $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();
                            $path = public_path('images/boxs/'.$img);
                            Image::make($image)->save($path);
                            $box->image = $img;
                        }

                        $box->save();
                    }

                    return response()->json(['location_reload' => 'Box updated', 'status' => 'success'],200);

                }
            }
            else{
                return response()->json(['warning' => unauthorized()],200);
            }
        }
        catch( Exception $e ){
            return response()->json(['error' => $e->getMessage()],200);
        }
    }
    //update function end
}
