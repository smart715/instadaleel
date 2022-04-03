<?php

namespace App\Http\Controllers\Backend\AppDataModule\Package;

use App\Http\Controllers\Controller;
use App\Models\AppDataModule\Package;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PackageController extends Controller
{
    //index function start
    public function index(){
        try{
            if( can("all_package") ){
                return view("backend.modules.app_data_module.package.index");
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
            if( can('all_package') ){
                
                $package = Package::select("id","title","duration_days","is_active")->get();
    
                return DataTables::of($package)

                ->rawColumns(['action', 'is_active','duration_days'])

                ->editColumn('duration_days', function (Package $package) {
                    return $package->duration_days .' Days';
                })

                ->editColumn('is_active', function (Package $package) {
                    if ($package->is_active == true) {
                        return '<p class="badge badge-success">Active</p>';
                    } else {
                        return '<p class="badge badge-danger">Inactive</p>';
                    }
                })
                ->addColumn('action', function (Package $package) {
                    return '
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown'.$package->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown'.$package->id.'">
    
                            '.( can("edit_event") ? '
                            <a class="dropdown-item" href="#" data-content="'.route('package.edit.modal',encrypt($package->id)).'" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            ': '') .'

    
                        </div>
                    </div>
                    ';
                })
                ->addIndexColumn()
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
            if( can("add_package") ){
                return view("backend.modules.app_data_module.package.modals.add");
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
            if( can("add_package") ){
                $validator = Validator::make($request->all(),[
                    "title" => "required|unique:packages,title",
                    "duration_days" => "required|integer",
                ]);

                if( $validator->fails() ){
                    return response()->json([
                        'errors' => $validator->errors()
                    ],422);
                }
                else{
                    $package = new Package();

                    $package->title = $request->title;
                    $package->duration_days = $request->duration_days;
                    $package->is_active = true;

                    if( $package->save() ){
                        return response()->json([
                            'success' => 'New package created'
                        ],200);
                    }

                }

            }
            else{
                return response()->json([
                    'warning' => unauthorized()
                ],200);
            }
        }
        catch( Exception $e ){
            return response()->json([
                'warning' => $e->getMessage()
            ],200);
        }
    }
    //add function end


    //edit_modal function start
    public function edit_modal($id){
        try{
            if( can("edit_package") ){
                $id = decrypt($id);
                $package = DB::select("SELECT * FROM packages WHERE id = $id");

                if( isset($package[0]) ){
                    $package = $package[0];
                    return view("backend.modules.app_data_module.package.modals.edit", compact('package'));
                }
                else{
                    return "No Data Found";
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
    //edit_modal function end


    //edit function start
    public function edit(Request $request, $id){
        try{
            if( can("edit_package") ){
                $id = decrypt($id);

                $validator = Validator::make($request->all(),[
                    "title" => "required|unique:packages,title,". $id,
                    "duration_days" => "required|integer",
                ]);

                if( $validator->fails() ){
                    return response()->json([
                        'errors' => $validator->errors()
                    ],422);
                }
                else{
                    $package = Package::find($id);

                    $package->title = $request->title;
                    $package->duration_days = $request->duration_days;
                    $package->is_active = $request->is_active;

                    if( $package->save() ){
                        return response()->json([
                            'success' => 'Package updated'
                        ],200);
                    }

                }

            }
            else{
                return response()->json([
                    'warning' => unauthorized()
                ],200);
            }
        }
        catch( Exception $e ){
            return response()->json([
                'warning' => $e->getMessage()
            ],200);
        }
    }
    //edit function end
}
