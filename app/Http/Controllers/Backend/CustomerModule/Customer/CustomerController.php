<?php

namespace App\Http\Controllers\Backend\CustomerModule\Customer;

use App\Http\Controllers\Controller;
use App\Models\CustomerModule\Customer;
use App\Models\CustomerModule\History;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    //index function start
    public function index(Request $request)
    {
        try {
            if (can("all_customer")) {

                $search = $request->search;
                $is_otp_verified = $request->is_otp_verified;
                $is_active = $request->is_active;

                $query = Customer::orderBy("id", "desc")->select("id", "firstname", "lastname", "image", "phone", "email", "is_otp_verified", "is_active", "last_active");

                if ($search) {
                    $query->where("firstname", "LIKE", "%$search%")
                        ->orWhere("lastname", "LIKE", "%$search%")
                        ->orWhere("email", "LIKE", "%$search%")
                        ->orWhere("phone", "LIKE", "%$search%")
                        ->orWhere("occupation", "LIKE", "%$search%");
                }


                if ($is_otp_verified == "1") {
                    $query->where("is_otp_verified", true)->get();
                }
                if ($is_otp_verified == "0") {
                    $query->where("is_otp_verified", false)->get();
                }

                if ($is_active == "1") {
                    $query->where("is_active", true);
                }
                if ($is_active == "0") {
                    $query->where("is_active", false);
                }

                $customers = $query->paginate(10);

                return view("backend.modules.customer_module.customer.index", compact("customers", "search", "is_otp_verified", "is_active"));
            } else {
                return view("errors.403");
            }
        } catch (Exception $e) {
            return back()->with('warning', $e->getMessage());
        }
    }
    //index function end


    //view_modal function start
    public function view_modal($id)
    {
        try {
            if (can("view_customer")) {
                $id = decrypt($id);
                $customer = Customer::where("id", $id)->first();

                if ($customer) {
                    $customer['coin'] = History::where('customer_id',$customer->id)->sum('amount');
                    return view("backend.modules.customer_module.customer.modals.view", compact("customer"));
                } else {
                    return "No customer found";
                }
            } else {
                return unauthorized();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    //view_modal function end


    //add_modal function start
    public function add_modal()
    {
        try {
            if (can("add_customer")) {
                return view("backend.modules.customer_module.customer.modals.add");
            } else {
                return unauthorized();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    //add_modal function end


    //add function start
    public function add(Request $request)
    {
        try {
            if (can("add_customer")) {
                $validator = Validator::make($request->all(), [
                    "firstname"       => "required",
                    "lastname"       => "required",
                    "phone"      => "required|unique:customers,phone",
                    "email"      => "required|email|unique:customers,email",
                    "password"   => "required|min:6|confirmed",
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => 'error',
                        'data' => $validator->errors()
                    ], 200);
                } else {
                    $customer = new Customer();
                    $customer->firstname = $request->firstname;
                    $customer->lastname = $request->lastname;
                    $customer->phone = $request->phone;
                    $customer->email = $request->email;
                    $customer->password = Hash::make($request->password);
                    $customer->last_active = date('Y-m-d H:i:s');
                    $customer->month  = Carbon::now()->month;
                    $customer->year  = Carbon::now()->year;
                    $customer->is_active = true;
                    $customer->is_otp_verified = true;

                    if ($customer->save()) {
                        return response()->json([
                            'status' => 'success',
                            'location_reload' => 'New Customer Added',
                        ], 200);
                    }
                }
            } else {
                return response()->json([
                    'warning' => unauthorized()
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 200);
        }
    }
    //add function end


    //delete_modal function start
    public function delete_modal($id)
    {
        try {
            if (can("delete_customer")) {
                $id = decrypt($id);
                $customer = Customer::where("id", $id)->first();

                if ($customer) {
                    return view("backend.modules.customer_module.customer.modals.delete", compact("customer"));
                } else {
                    return "No customer found";
                }
            } else {
                return unauthorized();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    //delete_modal function end


    //delete function start
    public function delete($id)
    {
        try {
            if (can("delete_customer")) {
                $id = decrypt($id);
                $customer = Customer::where("id", $id)->first();

                if ($customer) {
                    if (File::exists('images/customer/' . $customer->image)) {
                        File::delete('images/customer/' . $customer->image);
                    }

                    if ($customer->delete()) {
                        return response()->json([
                            "status" => "success",
                            "location_reload" => "Customer Deleted"
                        ], 200);
                    }
                } else {
                    return response()->json([
                        "warning" => "No customer found"
                    ], 200);
                }
            } else {
                return response()->json([
                    'warning' => unauthorized()
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 200);
        }
    }
    //delete function end
}
