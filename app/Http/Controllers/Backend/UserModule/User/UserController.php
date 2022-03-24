<?php

namespace App\Http\Controllers\Backend\UserModule\User;

use App\Http\Controllers\Controller;
use App\Models\UserModule\BuySell;
use App\Models\PriceCoverage\Prefix;
use App\Models\UserModule\Role;
use App\Models\Reports\Transaction;
use App\Models\UserModule\User;
use App\Models\UserModule\Validity;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //index start
    public function index(){
        if( can('all_user') ){
            return view("backend.modules.user_module.user.index");
        }else{
            return view("errors.403");
        }
    }

    //data start
    public function data(){
        if( can('all_user') ){
            if( auth('super_admin')->check() ){
                $user = User::orderBy('id', 'desc')->select("id","name","email","role_id","phone","is_active","image")->get();
            }elseif( auth('web')->check() ){
                $user = User::orderBy('id', 'desc')->where("id","!=",auth('web')->user()->id)->select("id","name","email","role_id","phone","is_active","image")->get();
            }
            return DataTables::of($user)
            ->rawColumns(['action', 'is_active','permission','name','type'])
            ->editColumn('name', function(User $user){
                if( $user->image == null ){
                    $src = asset("images/profile/user.png");
                }
                else{
                    $src = asset("images/profile/".$user->image);
                }

                
                return "
                    <img src='$src' width='50px' style='border-radius: 100%'>
                    <p> <b>Name :</b> $user->name</p>
                    <p><b>Email :</b> $user->email</p>
                    <p><b>Phone :</b> $user->phone</p>
                ";
            })
            ->editColumn('type', function (User $user) {
                return $user->role->name;
            })
            ->editColumn('is_active', function (User $user) {
                if ($user->is_active == true) {
                    return '<p class="badge badge-success">Active</p>';
                } else {
                    return '<p class="badge badge-danger">Inactive</p>';
                }
            })
            ->addColumn('action', function (User $user) {
                return '
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown'.$user->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdown'.$user->id.'">
                    
                        '.( can("reset_password") ? '
                        <a class="dropdown-item" href="#" data-content="'.route('user.reset.modal',$user->id).'" data-target="#myModal" data-toggle="modal">
                            <i class="fas fa-key"></i>
                            Reset Password
                        </a>
                        ': '') .'

                        '.( can("edit_user") ? '
                        <a class="dropdown-item" href="#" data-content="'.route('user.edit',$user->id).'" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                            <i class="fas fa-edit"></i>
                            Edit User
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


    //user add modal start
    public function add_modal(){
        if( can('add_user') ){
            return view("backend.modules.user_module.user.modals.add");
        }
        else{
            return unauthorized();
        }
    }

    //add user start
    public function add(Request $request){
        if( can('add_user') ){
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|unique:users,email,',
                'phone' => 'required|numeric',
                'role_id' => 'required|numeric',
                'password' => 'required|confirmed',
            ]);
            

           if( $validator->fails() ){
               return response()->json(['errors' => $validator->errors()] ,422);
           }else{
                try{
                    $user = new User();
                    $user->name = $request->name;
                    $user->email  = $request->email;
                    $user->phone = $request->phone;
                    $user->role_id = $request->role_id;
                    $user->password = Hash::make($request->password);
                    $user->is_active = true;
                    
                    if( $user->save() ){
                        return response()->json(['success' => 'New '.$user->role->name.' Created Successfully'], 200);
                    }

                }catch( Exception $e ){
                    return response()->json(['error' => $e->getMessage()],200);
                }
           }
        }else{
            return response()->json(['warning' => unauthorized()],200);
        }
    }

    //user edit modal start
    public function edit($id){
        if( can("edit_user") ){
            $user = User::where("id",$id)->select("name","email","phone","role_id","is_active","id")->first();
            return view("backend.modules.user_module.user.modals.edit", compact("user"));
        }
        else{
            return unauthorized();
        }
    }

    //user update modal start
    public function update(Request $request, $id){
        if( can('edit_user') ){
            
            $validator = Validator::make($request->all(),[
                'is_active' => 'required',
                'name' => 'required',
                'email' => 'required|unique:users,email,'. $id,
                'phone' => 'required|numeric',
                'role_id' => 'required|numeric',
           ]);

           if( $validator->fails() ){
               return response()->json(['errors' => $validator->errors()] ,422);
           }else{
                try{
                    $user = User::find($id);
                    $user->is_active = $request->is_active;
                    $user->name = $request->name;
                    $user->email  = $request->email;
                    $user->phone = $request->phone;
                    $user->role_id = $request->role_id;

                    if( $user->save() ){
                        return response()->json(['success' => $user->name . "'s Account Updated Successfully"], 200);
                    }
                }catch( Exception $e ){
                    return response()->json(['error' => $e->getMessage()],200);
                }
           }
        }else{
            return response()->json(['warning' => unauthorized()],200);
        }
    }

    //user reset modal start
    public function reset_modal($id){
        if( can("reset_password") ){
            $user = User::find($id);
            return view("backend.modules.user_module.user.modals.reset", compact("user"));
        }
        else{
            return unauthorized();
        }
    }

    //user reset start
    public function reset($id, Request $request){
        if( can("reset_password") ){
            $validator = Validator::make($request->all(),[
                'password' => 'required|confirmed|min:6',
           ]);

           if( $validator->fails() ){
               return response()->json(['errors' => $validator->errors()] ,422);
           }
           else{
               try{
                    $user = User::find($id);
                    $user->password = Hash::make($request->password);
                    if( $user->save() ){
                        return response()->json(['success' => 'Password Reset Successfully'], 200);
                    }
               }
               catch( Exception $e ){
                return response()->json(['error' => $e->getMessage()],200);
                }
           }
            
        }
        else{
            return response()->json(['warning' => unauthorized()],200);
        }
    }

    
}