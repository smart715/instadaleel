<?php

namespace App\Http\Controllers\Backend\SettingsModule\Banner;

use App\Http\Controllers\Controller;
use App\Models\SettingsModule\Banner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    //index function start
    public function index(){
        try{
            if( can("banner") ){
                return view("backend.modules.setting_module.banner.index");
            }
            else{
                return view("errors.403");
            }
        }
        catch( Exception $e ){
            return back()->with('warning', $e->getMessage());
        }
    }
    //index function end


    //data function start
    public function data(){
        try{
            if( can('banner') ){
                $banner = Banner::orderBy("position","asc")->select("id","position","title","image","is_active")->get();
    
                return DataTables::of($banner)
                ->rawColumns(['action', 'is_active','image'])
                ->editColumn('image', function(Banner $banner){
                    $src = asset("images/banner/".$banner->image);
                    
                    return "
                        <img src='$src' width='50px'>
                    ";
                })
                
                ->editColumn('is_active', function (Banner $banner) {
                    if ($banner->is_active == true) {
                        return '<p class="badge badge-success">Active</p>';
                    } else {
                        return '<p class="badge badge-danger">Inactive</p>';
                    }
                })
                ->addColumn('action', function (Banner $banner) {
                    return '
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown'.$banner->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown'.$banner->id.'">
    
                            '.( can("edit_banner") ? '
                            <a class="dropdown-item" href="#" data-content="'.route('banner.edit.modal',encrypt($banner->id)).'" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            ': '') .'

                            '.( can("delete_banner") ? '
                            <a class="dropdown-item" href="#" data-content="'.route('banner.delete.modal',encrypt($banner->id)).'" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                <i class="fas fa-trash"></i>
                                Delete
                            </a>
                            ': '') .'

                            '.( can("view_banner") ? '
                            <a class="dropdown-item" href="#" data-content="'.route('banner.view.modal',encrypt($banner->id)).'" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                <i class="fas fa-eye"></i>
                                View
                            </a>
                            ': '') .'
    
                        </div>
                    </div>
                    ';
                })
                ->make(true);
            }else{
                return unauthorized();
            }
        }
        catch( Exception $e ){
            return $e->getMessage();
        }
    }
    //data function end


    //add_modal function start
    public function add_modal(){
        try{
            if( can("add_banner") ){
                return view("backend.modules.setting_module.banner.modals.add");
            }
            else{
                return unauthorized();
            }

        }
        catch( Exception $e ){
            return $e->getMessage();
        }
    } 
    //add_modal function end


    //add function start
    public function add(Request $request){
        try{
            if( can("add_banner") ){
                $validator = Validator::make($request->all(), [
                    "position" => "required|integer|min:1|unique:banners,position",
                    "title" => "required",
                    // "image" => "required|mimes:jpg,png,jpeg,webp,svg|dimensions:width=900,height=450",
                    "image" => "required|mimes:jpg,png,jpeg,webp,svg",
                    "button_text" => "required",
                    "link" => "required",
                ]);

                if( $validator->fails() ){
                    return response()->json(['errors' => $validator->errors()],422);
                }
                else{
                    $banner = new Banner();

                    
                    $banner->position = $request->position;
                    $banner->title = $request->title;
                    $banner->button_text = $request->button_text;
                    $banner->link = $request->link;
                    $banner->is_active = true;

                    if( $request->image ){
                        $image = $request->file('image');
                        $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();
                        $location = public_path('images/banner/'.$img);
                        Image::make($image)->save($location);
                        $banner->image = $img;
                    }

                    if( $banner->save() ){
                        return response()->json(['success' => 'New banner Created'],200);
                    }
                    
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
    //add function end


    //edit_modal function start
    public function edit_modal($id){
        try{
            if( can("edit_banner") ){
                $banner = Banner::find(decrypt($id));
                return view("backend.modules.setting_module.banner.modals.edit", compact('banner'));
            }
            else{
                return unauthorized();
            }
        }
        catch( Exception $e ){
            return $e->getMessage();
        }
    } 
    //edit_modal function end


    //edit function start
    public function edit(Request $request, $id){
        try{
            $id = decrypt($id);

            if( can("edit_banner") ){
                $validator = Validator::make($request->all(), [
                    "position" => "required|integer|min:1|unique:banners,position,". $id,
                    "title" => "required",
                    // "image" => "mimes:jpg,png,jpeg,webp,svg|dimensions:width=900,height=450",
                    "image" => "mimes:jpg,png,jpeg,webp,svg",
                    "button_text" => "required",
                    "link" => "required",
                    "is_active" => "required",
                ]);

                if( $validator->fails() ){
                    return response()->json(['errors' => $validator->errors()],422);
                }
                else{
                    $banner = Banner::find($id);
                    
                    $banner->position = $request->position;
                    $banner->title = $request->title;
                    $banner->button_text = $request->button_text;
                    $banner->link = $request->link;
                    $banner->is_active = $request->is_active;

                    if( $request->image ){
                        if( File::exists('images/banner/'. $banner->image) ){
                            File::delete('images/banner/'. $banner->image);
                        }

                        $image = $request->file('image');
                        $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();
                        $location = public_path('images/banner/'.$img);
                        Image::make($image)->save($location);
                        $banner->image = $img;
                    }

                    if( $banner->save() ){
                        return response()->json(['success' => 'Banner updated'],200);
                    }
                    
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
    //edit function end


    //delete_modal function start
    public function delete_modal($id){
        try{
            if( can("delete_banner") ){
                $banner = Banner::find(decrypt($id));
                return view("backend.modules.setting_module.banner.modals.delete", compact('banner'));
            }
            else{
                return unauthorized();
            }
        }
        catch( Exception $e ){
            return $e->getMessage();
        }
    } 
    //delete_modal function end


    //delete function start
    public function delete(Request $request, $id){
        try{
            $id = decrypt($id);

            if( can("delete_banner") ){
                
                $banner = Banner::find($id);

                if( $banner ){
                    if( File::exists('images/banner/'. $banner->image) ){
                        File::delete('images/banner/'. $banner->image);
                    }
    
                    if( $banner->delete() ){
                        return response()->json(['success' => 'Banner deleted'],200);
                    }
                }
                else{
                    return response()->json(['warning' => 'Banner already deleted'],200);
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
    //delete function end


    //view_modal function start
    public function view_modal($id){
        try{
            if( can("view_banner") ){
                $banner = Banner::find(decrypt($id));
                return view("backend.modules.setting_module.banner.modals.view", compact('banner'));
            }
            else{
                return unauthorized();
            }
        }
        catch( Exception $e ){
            return $e->getMessage();
        }
    } 
    //view_modal function end

}
