<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerModule\CustomerResource;
use App\Models\CustomerModule\Customer;
use App\Models\CustomerModule\Verify;
use App\Models\CustomerModule\History;
use App\Models\SettingsModule\Coins;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'me', 'register', 'logout', 'verify', 'get_code', 'get_profile', 'update_profile','get_history', 'resend_code', 'change_password', 'manage_session']]);
    }


    //reister function start
    public function register(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                "name"       => "required",
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

                $verify = new Verify();

                $code = rand(000000, 999999);
                $verify->phone = $request->phone;
                $verify->code = $code;

                if ($verify->save()) {

                    // get your REST API keys from MXT https://mxt.smsglobal.com/integrations
                    // \SMSGlobal\Credentials::set('4516eec6a32e175c9dfcaf822a8bcc9b', '00830b14fd2e47ef6071ff185c2374c3');

                    // $sms = new \SMSGlobal\Resource\Sms();

                    // $response = $sms->sendToOne('88'.$request->phone, "Your verification code is : $code","First Call");

                    // if( isset($response['messages'][0]['status']) ){
                    $customer = new Customer();
                    $customer->firstname = $request->name;
                    $customer->phone = $request->phone;
                    $customer->email = $request->email;
                    $customer->password = Hash::make($request->password);
                    $customer->last_active = date('Y-m-d H:i:s');
                    $customer->month  = Carbon::now()->month;
                    $customer->year  = Carbon::now()->year;

                    $customer->is_active = true;
                    $customer->is_otp_verified = true;

                    if ($customer->save()) {
                        $customer = DB::select(DB::raw("SELECT * FROM customers WHERE id = $customer->id"))[0];
                        return response()->json([
                            'status' => 'success',
                            'message' => 'A verification code send to your mobile',
                            'data' => $customer->phone
                        ], 200);
                    }
                    // }
                    // else{
                    //     return response()->json([
                    //         'status' => 'error',
                    //         'message' => 'Failed To Send SMS',
                    //     ],200); 
                    // }


                }
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ], 200);
        }
    }
    //reister function end


    //login function start
    public function login(Request $request)
    {

        // validator
        $validator = Validator::make($request->all(), [
            "phone"       => "required|exists:customers,phone",
            "password"   => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'data' => $validator->errors()
            ], 200);
        }

        $customer = Customer::where("phone", $request->phone)->first();

        if ($customer->is_active == false) {
            return response()->json([
                'status' => 'error',
                'data' => 'Account deactivated'
            ], 200);
        } elseif ($customer->is_otp_verified == false) {
            $verify = new Verify();

            $code = rand(000000, 999999);
            $verify->phone = $request->phone;
            $verify->code = $code;

            if ($verify->save()) {
                \SMSGlobal\Credentials::set('4516eec6a32e175c9dfcaf822a8bcc9b', '00830b14fd2e47ef6071ff185c2374c3');

                $sms = new \SMSGlobal\Resource\Sms();

                $response = $sms->sendToOne('88' . $request->phone, "Your verification code is : $code", "First Call");

                if (isset($response['messages'][0]['status'])) {
                    return response()->json([
                        'status' => 'warning',
                        'message' => 'A verification code send to your mobile',
                        'data' => $customer->phone
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Failed To Send SMS',
                    ], 200);
                }
            }
        } else {

            // login
            $credentials = request(['phone', 'password']);

            if (!$token = auth()->attempt($credentials)) {
                return response()->json(['status' => 'error', 'data' => 'Unauthorized'], 401);
            }
            $customer['coin'] = History::where('customer_id',$customer->id)->sum('amount');

            return $this->respondWithToken($token, $customer);
        }
    }
    //login function end


    //resend_code function start
    public function resend_code(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "phone"      => "required|exists:customers,phone",
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'data' => $validator->errors()
                ], 200);
            } else {
                $verify = new Verify();

                $code = rand(000000, 999999);
                $verify->phone = $request->phone;
                $verify->code = $code;

                if ($verify->save()) {
                    // get your REST API keys from MXT https://mxt.smsglobal.com/integrations
                    \SMSGlobal\Credentials::set('4516eec6a32e175c9dfcaf822a8bcc9b', '00830b14fd2e47ef6071ff185c2374c3');

                    $sms = new \SMSGlobal\Resource\Sms();

                    $response = $sms->sendToOne('88' . $request->phone, "Your verification code is : $code", "First Call");

                    if (isset($response['messages'][0]['status'])) {

                        return response()->json([
                            'status' => 'success',
                            'message' => 'A verification code send to your mobile',
                        ], 200);
                    } else {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Failed To Send SMS',
                        ], 200);
                    }
                }
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ], 200);
        }
    }
    //resend_code function end


    //verify  function start
    public function verify(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "code" => "required|integer|min:5",
                "phone" => "required",
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'data' => $validator->errors()
                ], 200);
            } else {
                $verify = Verify::where("code", $request->code)->where("phone", $request->phone)->select("code", "phone", "created_at")->first();

                if ($verify) {

                    $now_time = Carbon::now()->toTimeString();
                    $verification_time = date("H:i:s", strtotime($verify->created_at->toTimeString()) + 5 * 60);


                    if ($now_time > $verification_time) {
                        return response()->json([
                            'status' => 'error',
                            'data' => 'Code is expired. Resend it again'
                        ], 200);
                    } else {
                        $customer = Customer::where("phone", $request->phone)->first();

                        if ($customer) {
                            $customer->is_otp_verified = true;

                            if ($customer->save()) {
                                $verify->delete();
                                return response()->json([
                                    'status' => 'success',
                                    'message' => 'Verification successfully done',
                                    'data' => new CustomerResource($customer)
                                ], 200);
                            }
                        } else {
                            return response()->json([
                                'status' => 'error',
                                'data' => 'No customer found with this phone number'
                            ], 200);
                        }
                    }
                } else {
                    return response()->json([
                        'status' => 'error',
                        'data' => 'Code is expired. Please try again'
                    ], 200);
                }
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ], 200);
        }
    }
    //verify  function end


    //reset_password function start
    public function reset_password(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "password" => "required|min:8|confirmed",
                "phone" => "required|exists:customers,phone",
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'data' => $validator->errors()
                ], 200);
            } else {
                $customer = Customer::where("phone", $request->phone)->first();

                $customer->password = Hash::make($request->password);

                if ($customer->save()) {
                    return response()->json([
                        'status' => 'success',
                        'data' => 'Password reset successfully done'
                    ], 200);
                }
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ], 200);
        }
    }
    //reset_password function end


    //change_password function start
    public function change_password(Request $request)
    {
        try {
            $customer = Customer::find($request->customer_id);

            if ($customer) {
                $validator = Validator::make($request->all(), [
                    "old_password" => "required",
                    "password" => "required|min:6|confirmed",
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => 'error',
                        'data' => $validator->errors()
                    ], 200);
                } else {

                    if (Hash::check($request->old_password, $customer->password)) {
                        $customer->password = Hash::make($request->password);

                        if ($customer->save()) {
                            return response()->json([
                                'status' => 'success',
                                'data' => 'Password Updated'
                            ], 200);
                        }
                    } else {
                        return response()->json([
                            'status' => 'error',
                            'data' => 'Old password not matched'
                        ], 200);
                    }
                }
            } else {
                return response()->json([
                    'status' => 'error',
                    'data' => 'Invalid customer'
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ], 200);
        }
    }
    //change_password function end


    //manage_session function start
    public function manage_session(Request $request)
    {
        try {

            if (auth('api')->check()) {
                $customer = Customer::where("id", auth('api')->user()->id)->first();

                return response()->json([
                    'status' => 'success',
                    'data' => new CustomerResource($customer)
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'data' => 'Token expire. Please login again'
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ], 200);
        }
    }
    //manage_session function end
    public function get_history(){
        
        try {
            $customer_id = Auth::user()->id;
            $customer = Customer::find($customer_id);

            $history = array();
            $note = array("Registration", "Comments", "Review", "Post");
            $id=0;
            foreach ($note as $one) {
                $id++;
                $history1 = array();
                $history1['id'] = $id;
                $history1['customer_id'] = $customer_id;
                $history1['note'] = $one;
                $history1['amount'] = intval(History::where('customer_id', $customer_id)->where("note", $one)->sum("amount"));
                $history[] = $history1;
            }

            return response()->json([
                'status' => 'success',
                'data' => $history
            ], 200);


        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ], 200);
        }
    }
    //get_profile function start
    public function get_profile()
    {
        try {
            $customer_id = Auth::user()->id;
            $customer = Customer::find($customer_id);
            $customer['coin'] = History::where('customer_id',$customer_id)->sum('amount');
            if ($customer) {
                return response()->json([
                    'status' => 'success',
                    'data' => new CustomerResource($customer)
                ], 200);
            } else {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'No user',
                    'data' => NULL,
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ], 200);
        }
    }
    //get_profile function end

    //update_profile function start
    public function update_profile(Request $request)
    {
        try {
            $customer_id = Auth::user()->id;
            $customer = Customer::find($customer_id);

            if ($customer) {
                $validator = Validator::make($request->all(), [
                    'firstname' => ['required', 'string', 'max:255'],
                    'lastname' => ['required', 'string', 'max:255'],
                    'nickname' => ['required', 'string', 'max:255'],
                    'nationality' => ['required', 'string', 'max:255'],
                    'address' => ['required', 'string', 'max:255'],
                    "phone" => "required|unique:customers,phone," . $customer->id,
                    "email" => "required|unique:customers,email," . $customer->id,
                    'birthday' => ['required'],
                    "gender" => "in:Male,Female,Other",
                    "marital_status" => "in:Married,Single",
                    "occupation" => "in:Business,Service,Other",
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => 'error',
                        'data' => $validator->errors()
                    ], 200);
                } else {
                    $customer->firstname = $request->firstname;
                    $customer->lastname = $request->lastname;
                    $customer->nickname = $request->nickname;
                    $customer->nationality = $request->nationality;
                    $customer->address = $request->address;
                    $customer->phone = $request->phone;
                    $customer->email = $request->email;
                    $customer->birthday = date('Y-m-d', strtotime($request->birthday));
                    $customer->gender = $request->gender;
                    $customer->marital_status = $request->marital_status;
                    $customer->occupation = $request->occupation;

                    // $customer->latitude = $request->latitude;
                    // $customer->longitude = $request->longitude;

                    // image upload 
                    if ($request->image) {
                        if (File::exists('images/customer/' . $customer->image)) {
                            File::delete('images/customer/' . $customer->image);
                        }
                        $image = $request->file('image');
                        $img = Str::slug($request->name) . time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
                        $location = public_path('images/customer/' . $img);
                        Image::make($image)->save($location);
                        $customer->image = $img;
                    }

                    if ($customer->save()) {
                        if(History::where('customer_id',$customer_id)->where('note','Registration')->count()==0){
                            $coin = Coins::where('id',2)->first()->amount;
                            $history = new History();
                            $history->customer_id = $customer_id;
                            $history->note = 'Registration';
                            $history->amount = $coin;
                            $history->save();
                        }
                        $customer['coin'] = History::where('customer_id',$customer_id)->sum('amount');
                        return response()->json([
                            'status' => 'success',
                            'data' => new CustomerResource($customer)
                        ], 200);
                    }
                }
            } else {
                return response()->json([
                    'status' => 'error',
                    'data' => 'Invalid customer'
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ], 200);
        }
    }
    //update_profile function end



    //refresh function 
    public function refresh($token, $customer)
    {
        return $this->respondWithToken(auth()->refresh(), $customer);
    }

    //respondWithToken function 
    protected function respondWithToken($token, $customer)
    {
        return response()->json([
            'status' => 'success',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 60 * 24 * 7,
            'data' => $customer
        ]);
    }
}
