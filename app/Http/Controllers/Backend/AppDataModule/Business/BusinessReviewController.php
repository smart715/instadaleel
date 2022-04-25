<?php

namespace App\Http\Controllers\Backend\AppDataModule\Business;

use App\Http\Controllers\Controller;
use App\Models\AppDataModule\Business;
use App\Models\AppDataModule\BusinessReview;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BusinessReviewController extends Controller
{
    //index function start
    public function index($id, Request $request){
        try{
            if( can("view_business_review") ){
                $business = Business::where("id", decrypt($id))->select("id","code")->first();

                if( $business ){
                    $search = $request->search;
                    $star = $request->star;
                    $date = $request->date;

                    $query = BusinessReview::orderBy("id","desc")->select("id","customer_id","rating","is_approved","is_shown","created_at")->where("business_id",$business->id)->with("customer");

                    if( $search ){
                        $query->whereHas('customer', function($customer) use ($search){
                            $customer->where("name","LIKE","%$search%");
                        });
                    }

                    if( $star ){
                        $query->where("rating",$star);
                    }

                    if( $date ){
                        $query->whereDate("created_at",$date);
                    }

                    $business_reviews = $query->paginate(10);
    
                    return view("backend.modules.app_data_module.business.business_reviews.index", compact("business", "business_reviews", "search", "star", "date"));
                }
                else{
                    return back()->with('warning', 'No business found');
                }
                

            }
            else{
                return view("errors.403");
            }
        }
        catch ( Exception $e ){
            return back()->with('warning', $e->getMessage());
        }
    }
    //index function end


    //view_modal function start
    public function view_modal($id){
        try{
            if( can("view_business_review") ){
                $business_review = BusinessReview::where("id",decrypt($id))->first();

                if( $business_review ){
                    return view("backend.modules.app_data_module.business.business_reviews.modals.view", compact("business_review"));
                }
                else{
                    return "No Data Found";
                }

            }   
            else{
                return unauthorized();
            }
        }
        catch ( Exception $e ){
            return $e->getMessage();
        }
    } 
    //view_modal function end


    //delete_modal function start
    public function delete_modal($id){
        try{
            if( can("delete_business_review") ){
                $business_review = BusinessReview::where("id",decrypt($id))->first();

                if( $business_review ){
                    return view("backend.modules.app_data_module.business.business_reviews.modals.delete", compact("business_review"));
                }
                else{
                    return "No Data Found";
                }

            }   
            else{
                return unauthorized();
            }
        }
        catch ( Exception $e ){
            return $e->getMessage();
        }
    } 
    //delete_modal function end


    //delete function start
    public function delete(Request $request, $id){
        try{
            if( can("delete_business_review") ){
                $id = decrypt($id);
                
                $business_review = BusinessReview::find($id);

                if( $business_review ){


                    if( $business_review->delete() ){
                        $email = $business_review->customer->email;
                        Mail::send('backend.modules.app_data_module.business.business_reviews.emails.delete', [ 'business_review' => $business_review ], function ($message) use ($email) {
                            $message->from(mail_from());
                            $message->to($email);
                            $message->subject('Business Review Deleted');
                        });

                        return response()->json([
                            'status' => 'success',
                            'location_reload' => 'Business Review Deleted'
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
}
