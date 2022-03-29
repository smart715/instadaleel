<?php

namespace App\Http\Controllers\Backend\AppDataModule\City;

use App\Http\Controllers\Controller;
use App\Models\AppDataModule\Location;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CityController extends Controller
{
    //index function start
    public function index(){
        try{
            if( can("city") ){
                return view("backend.modules.app_data_module.city.index");
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
            if( can('city') ){
                $city = Location::orderBy("id","desc")->where("type","City")->select("id","name","location_id","is_active")->get();
    
                return DataTables::of($city)
                ->rawColumns(['action', 'is_active','image','country'])
                ->editColumn('image', function(Location $city){
                    $src = asset("images/country/".$city->parent->image);
                    return "
                        <img src='$src' width='50px'>
                    ";
                })
                
                ->editColumn('country', function(Location $city){
                    return $city->parent->name;
                })

                ->editColumn('is_active', function (Location $city) {
                    if ($city->is_active == true) {
                        return '<p class="badge badge-success">Active</p>';
                    } else {
                        return '<p class="badge badge-danger">Inactive</p>';
                    }
                })
                ->addColumn('action', function (Location $city) {
                    return '
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown'.$city->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown'.$city->id.'">
    
                            '.( can("edit_city") ? '
                            <a class="dropdown-item" href="#" data-content="'.route('city.edit.modal',encrypt($city->id)).'" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            ': '') .'

                            '.( can("view_city") ? '
                            <a class="dropdown-item" href="#" data-content="'.route('city.view.modal',encrypt($city->id)).'" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
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
            if( can("add_city") ){
                $countries = Location::where("is_active", true)->select("id","name")->orderBy("id","Desc")->where("type","Country")->get();
                return view("backend.modules.app_data_module.city.modals.add", compact('countries'));
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
            if( can("add_city") ){
                $validator = Validator::make($request->all(),[
                    "name" => "required|unique:locations,name",
                    "location_id" => "required",
                ]);
    
                if( $validator->fails() ){
                    return response()->json(['errors' => $validator->errors()],422);
                }
                else{
                    $location = new Location();
    
                    $location->name = $request->name;
                    $location->location_id = $request->location_id;
                    $location->type = "City";
                    $location->is_active = true;
    
                    if( $location->save() ){
                        return response()->json(['success' => 'New City Added'],200);
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
            if( can("edit_city") ){
                $countries = Location::where("is_active", true)->select("id","name")->where("type","Country")->orderBy("id","Desc")->get();
                $city = Location::find(decrypt($id));
                return view("backend.modules.app_data_module.city.modals.edit", compact('city','countries'));
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
            if( can("edit_city") ){
                $id = decrypt($id);
                $validator = Validator::make($request->all(),[
                    "name" => "required|unique:locations,name,". $id,
                    "location_id" => "required",
                ]);
    
                if( $validator->fails() ){
                    return response()->json(['errors' => $validator->errors()],422);
                }
                else{
                    $location = Location::find($id);

                    if( $location ){
                        $location->name = $request->name;
                        $location->location_id = $request->location_id;
                        $location->is_active = $request->is_active;
        
                        if( $location->save() ){
                            return response()->json(['success' => 'City updated'],200);
                        }
                    }
                    else{
                        return response()->json(['warning' => 'No location found'],200);
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
            if( can("view_city") ){
                $city = Location::find(decrypt($id));

                if( $city ){
                    return view("backend.modules.app_data_module.city.modals.view", compact('city'));
                }
                else{
                    return "No city found";
                }
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
