<?php

namespace App\Http\Controllers\Backend\AppDataModule\Business;

use App\Http\Controllers\Controller;
use App\Models\AppDataModule\Business;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{
    //index function start
    public function index(Request $request){
        try{
            if( can("all_business") ){
                $search = $request->search;

                $query = Business::orderBy("id","desc")->select("id","code","name","image","is_active","is_pinned","status");

                if( $search ){
                    $query->where("code","LIKE","%$search%");
                }

                $businesses = $query->paginate(10);
                
                return view("backend.modules.app_data_module.business.index", compact("businesses", "search"));
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


    //edit_modal function start
    public function edit_modal($id){
        try{
            if( can("edit_business") ){
                $id = decrypt($id);

                $business = DB::select("SELECT id,code,is_active,is_pinned,status FROM businesses WHERE id = $id");

                if( isset($business[0]) ){
                    $business = $business[0];
                    return view("backend.modules.app_data_module.business.modals.edit", compact("business"));
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
            if( can("edit_business") ){
                $id = decrypt($id);
                $validator = Validator::make($request->all(), [
                    'is_active' => 'required|integer|in:0,1',
                    'is_pinned' => 'required|integer|in:0,1',
                    'status' => 'required|in:Running,Expired',
                ]);

                if( $validator->fails() ){
                    return response()->json(['errors' => $validator->errors()],422);
                }
                else{
                    $business = Business::find($id);

                    if( $business ){
                        $business->is_active = $request->is_active;
                        $business->is_pinned = $request->is_pinned;
                        $business->status = $request->status;

                        if( $business->save() ){
                            return response()->json([
                                'status' => 'success',
                                'location_reload' => 'Business updated'
                            ],200);
                        }
                    }
                    else{
                        return response()->json(['warning' => 'No data found'],200);
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
            if( can("delete_business") ){
                $id = decrypt($id);

                $business = DB::select("SELECT id,code FROM businesses WHERE id = $id");

                if( isset($business[0]) ){
                    $business = $business[0];
                    return view("backend.modules.app_data_module.business.modals.delete", compact("business"));
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
    //delete_modal function end


    //delete function start
    public function delete(Request $request, $id){
        try{
            if( can("delete_business") ){
                $id = decrypt($id);
                
                $business = Business::find($id);

                if( $business ){

                    if( File::exists('images/business/'. $business->image) ){
                        File::delete('images/business/'. $business->image);
                    }

                    if( $business->delete() ){
                        return response()->json([
                            'status' => 'success',
                            'location_reload' => 'Business deleted'
                        ],200);
                    }
                }
                else{
                    return response()->json(['warning' => 'No data found'],200);
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
            if( can("view_business") ){
                $id = decrypt($id);

                $business = DB::select("SELECT 

                    businesses.id, businesses.code, businesses.name as business_name, businesses.email, businesses.image, businesses.address, businesses.contact_number, businesses.short_description, businesses.address, businesses.rating, businesses.social_links, businesses.website_link, businesses.office_hour, businesses.is_active, businesses.is_pinned, businesses.status, businesses.created_at, businesses.updated_at,

                    customers.id,customers.name as customer_name, customers.email as customer_email, customers.phone as customer_phone,

                    locations.id, locations.name as location_name

                    FROM businesses 

                    INNER JOIN customers ON businesses.customer_id = customers.id
                    INNER JOIN locations ON businesses.location_id = locations.id 

                    WHERE businesses.id = $id 
                ");

                if( isset($business[0]) ){
                    $business = $business[0];
                    return view("backend.modules.app_data_module.business.modals.view", compact("business"));
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
    //view_modal function end
}
