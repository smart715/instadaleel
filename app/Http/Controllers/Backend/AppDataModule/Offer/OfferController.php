<?php

namespace App\Http\Controllers\Backend\AppDataModule\Offer;

use App\Http\Controllers\Controller;
use App\Models\AppDatamodule\Offer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    //index function start
    public function index(Request $request){
        try{
            if( can("all_offer") ){
                $is_approved = $request->is_approved;
                $is_active = $request->is_active;
                $search = $request->search;

                $query = Offer::orderBy("position","asc")->select("id","position","title","image","is_approved","is_active","customer_id","business_id")->with("customer","business");

                if( $request->is_approved == '1' ){
                    $query->where("is_approved", true);
                }  
                if( $request->is_approved == '0' ){
                    $query->where("is_approved", false);
                }

                if( $request->is_active == '1' ){
                    $query->where("is_active", true);
                }  
                if( $request->is_active == '0' ){
                    $query->where("is_active", false);
                }

                if( $request->search ){ 
                    $query->where("title","LIKE","%$search%");                    
                }

                $offers = $query->paginate(10);

                return view("backend.modules.app_data_module.offer.index", compact("offers","is_approved","is_active","search"));
            }
            else{
                return view("errors.403");
            }
        }
        catch( Exception $e ){
            return back()->with('error', $e->getMessage());
        }
    }
    //index function end


    //edit_modal function start
    public function edit_modal($id){
        try{
            if( can("edit_offer") ){
                $offer = Offer::where("id", decrypt($id))->first();

                if( $offer ){
                    return view("backend.modules.app_data_module.offer.modals.edit", compact("offer"));
                }
                else{
                    return "No offer found";
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
            if( can("edit_offer") ){
                $id = decrypt($id);
                $validator = Validator::make($request->all(), [
                    'is_active' => 'required|integer|in:0,1',
                    'is_approved' => 'required|integer|in:0,1',
                ]);

                if( $validator->fails() ){
                    return response()->json(['errors' => $validator->errors()],422);
                }
                else{
                    $offer = Offer::find($id);

                    if( $offer ){
                        $offer->is_active = $request->is_active;
                        $offer->is_approved = $request->is_approved;

                        if( $offer->save() ){

                            if( $request->send_email == '1' ){
                                $email = $offer->customer->email;
                                Mail::send('backend.modules.app_data_module.offer.emails.notify', [ 'offer' => $offer ], function ($message) use ($email, $offer) {
                                    $message->from(mail_from());
                                    $message->to($email);
                                    $message->subject('Offer Status Updated ( ' . $offer->business->code . ' )');
                                });
                            }

                            return response()->json([
                                'status' => 'success',
                                'location_reload' => 'offer updated'
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
            if( can("delete_offer") ){

                $offer = Offer::where("id", decrypt($id))->first();

                if( $offer ){
                    return view("backend.modules.app_data_module.offer.modals.delete", compact("offer"));
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
            if( can("delete_offer") ){
                $id = decrypt($id);
                
                $offer = Offer::find($id);

                if( $offer ){

                    if( File::exists('images/offer/'. $offer->image) ){
                        File::delete('images/offer/'. $offer->image);
                    }
                    
                    $data = $offer;
                    $email = $offer->customer->email;

                    if( $offer->delete() ){

                        Mail::send('backend.modules.app_data_module.offer.emails.delete', [ 'offer' => $data ], function ($message) use ($email) {
                            $message->from(mail_from());
                            $message->to($email);
                            $message->subject('Offer Deleted');
                        });

                        return response()->json([
                            'status' => 'success',
                            'location_reload' => 'Offer deleted'
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
            if( can("view_offer") ){
                $offer = Offer::where("id", decrypt($id))->with("customer","business")->first();

                if( $offer ){
                    return view("backend.modules.app_data_module.offer.modals.view", compact("offer"));
                }
                else{
                    return "No offer found";
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
