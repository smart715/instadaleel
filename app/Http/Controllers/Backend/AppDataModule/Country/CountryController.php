<?php

namespace App\Http\Controllers\Backend\AppDataModule\Country;

use App\Http\Controllers\Controller;
use App\Models\AppDataModule\Location;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CountryController extends Controller
{
    //index function start
    public function index(){
        try{
            if( can("country") ){
                return view("backend.modules.app_data_module.country.index");
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
            if( can('country') ){
                $country = Location::orderBy("id","desc")->where("type","Country")->select("id","name","image","is_active")->get();
    
                return DataTables::of($country)
                ->rawColumns(['action', 'is_active','image'])
                ->editColumn('image', function(Location $country){
                    $src = asset("images/country/".$country->image);
                    return "
                        <img src='$src' width='50px'>
                    ";
                })
                
                ->editColumn('is_active', function (Location $country) {
                    if ($country->is_active == true) {
                        return '<p class="badge badge-success">Active</p>';
                    } else {
                        return '<p class="badge badge-danger">Inactive</p>';
                    }
                })
                ->addColumn('action', function (Location $country) {
                    return '
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown'.$country->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown'.$country->id.'">
    
                            '.( can("edit_country") ? '
                            <a class="dropdown-item" href="#" data-content="'.route('country.edit.modal',encrypt($country->id)).'" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            ': '') .'

                            '.( can("view_country") ? '
                            <a class="dropdown-item" href="#" data-content="'.route('country.view.modal',encrypt($country->id)).'" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
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
            if( can("add_country") ){
                return view("backend.modules.app_data_module.country.modals.add");
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
            if( can("add_country") ){
                $validator = Validator::make($request->all(),[
                    "name" => "required|unique:locations,name",
                    "image" => "required|mimes:jpg,png,jpeg,webp,svg",
                ]);
    
                if( $validator->fails() ){
                    return response()->json(['errors' => $validator->errors()],422);
                }
                else{
                    $location = new Location();
    
                    $location->name = $request->name;
    
                    if( $request->image ){
                        $image = $request->file('image');
                        $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();
                        $path = public_path('images/country/'.$img);
                        Image::make($image)->save($path);
                        $location->image = $img;
                    }
    
                    $location->type = "Country";
                    $location->is_active = true;
    
                    if( $location->save() ){
                        return response()->json(['success' => 'New Country Added'],200);
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
            if( can("edit_country") ){
                $country = Location::find(decrypt($id));
                return view("backend.modules.app_data_module.country.modals.edit", compact('country'));
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

            if( can("edit_country") ){
                $id = decrypt($id);
                $validator = Validator::make($request->all(),[
                    "name" => "required|unique:locations,name,". $id,
                    "image" => "mimes:jpg,png,jpeg,webp,svg",
                ]);
    
                if( $validator->fails() ){
                    return response()->json(['errors' => $validator->errors()],422);
                }
                else{
                    $location = Location::find($id);
    
                    if( $location ){
                        $location->name = $request->name;
    
                        if( $request->image ){
                            if( File::exists('images/country/'. $location->image) ){
                                File::delete('images/country/'. $location->image);
                            }

                            $image = $request->file('image');
                            $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();
                            $path = public_path('images/country/'.$img);
                            Image::make($image)->save($path);
                            $location->image = $img;
                        }

                        $location->is_active = $request->is_active;
        
                        if( $location->save() ){
                            return response()->json(['success' => 'Country updated'],200);
                        }
                    }
                    else{
                        return response()->json(['warning' => 'No country found'],200);
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


    //view_modal function start
    public function view_modal($id){
        try{
            if( can("view_country") ){
                $country = Location::find(decrypt($id));
                return view("backend.modules.app_data_module.country.modals.view", compact('country'));
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
