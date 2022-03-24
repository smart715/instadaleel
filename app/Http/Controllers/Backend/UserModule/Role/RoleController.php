<?php

namespace App\Http\Controllers\Backend\UserModule\Role;

use App\Http\Controllers\Controller;
use App\Models\UserModule\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    //index start
    public function index(){
        if( can('roles') ){
            return view("backend.modules.user_module.role.index");
        }else{
            return view("errors.404");
        }
    }

    //data
    public function data(){
        if( can('roles') ){
            $role = Role::select("id","name","is_active")->get();
            return DataTables::of($role)
            ->rawColumns(['action', 'is_active'])
            ->editColumn('is_active', function (Role $role) {
                if ($role->is_active == true) {
                    return '<p class="badge badge-success">Active</p>';
                } else {
                    return '<p class="badge badge-danger">Inactive</p>';
                }
            })
            ->addColumn('action', function (Role $role) {
                return '
                <button type="button" data-content="'.route('role.edit',$role->id).'" data-target="#largeModal" class="btn btn-outline-dark" data-toggle="modal">
                                Edit
                </button>
                ';
            })
            ->make(true);
        }else{
            return view("errors.404");
        }
        
    }

    //add modal
    public function add_modal(){
        return view("backend.modules.user_module.role.modals.add");
    }

    //add start
    public function add(Request $request){
        if( can('roles') ){
            
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:roles,name',
            ]);
    
            if( $validator->fails() ){
                return response()->json(['errors' => $validator->errors()], 422);
            }else{
                try{
                    if( $request['permission'] ){
                        $role = new Role();
                        $role->name = $request->name;
                        $role->is_active = true;
                        if( $role->save() ){
                            foreach( $request['permission'] as $permission ){
                                $role->permission()->attach($permission);
                            }
                            return response()->json(['success' => 'New Role Added Successfully'], 200);
                        }
                    }
                    else{
                        return response()->json(['warning' => 'Please choose user permission.'],200);
                    }
                }
                catch(Exception $e){
                    return response()->json(['error' => $e->getMessage()], 200);
                }
            }
        }else{
            return view("errors.404");
        }
        
    }

    //role edit modal
    public function edit($id){
        if( can('roles') ){
            $role = Role::where("id",$id)->select("name","is_active","id")->first();
            return view("backend.modules.user_module.role.modals.edit", compact('role'));
        }else{
            return view("errors.404");
        }
        
    }

    //update start
    public function update(Request $request, $id){
        if( can('roles') ){
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:roles,name,'. $id,
            ]);
    
            if( $validator->fails() ){
                return response()->json(['errors' => $validator->errors()], 422);
            }else{
                try{
                    if( $request['permission'] ){
                        $role = Role::find($id);
                        $role->name = $request->name;
                        $role->is_active = $request->is_active;
                        if( $role->save() ){
                            $role->permission()->detach();
                            foreach( $request['permission'] as $permission ){
                                $role->permission()->attach($permission);
                            }
                            return response()->json(['success' => 'Role Updated Successfully'], 200);
                        }
                    }
                    else{
                        return response()->json(['warning' => 'Please choose user permission.'],200);
                    }
                }
                catch(Exception $e){
                    return response()->json(['error' => $e->getMessage()], 200);
                }
            }
        }else{
            return view("errors.404");
        }
    }
}