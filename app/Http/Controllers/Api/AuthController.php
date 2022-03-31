<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerModule\CustomerResource;
use App\Models\CustomerModule\Customer;
use App\Models\CustomerModule\Verify;
use App\Models\SettingsModule\AppInfo;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'me', 'register', 'logout','verify','get_code']]);
    }


    //reister function start
    public function register(Request $request){
        try{

            $validator = Validator::make($request->all(),[
                "name"       => "required",
                "phone"      => "required|unique:customers,phone",
                "email"      => "required|email|unique:customers,email",
                "password"   => "required|min:6|confirmed",
            ]);

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' => $validator->errors()
                ],200); 
            }
            else{

                $verify = new Verify();

                $code = rand(000000,999999);
                $verify->phone = $request->phone;
                $verify->code = $code;

                if( $verify->save() ){

                    // get your REST API keys from MXT https://mxt.smsglobal.com/integrations
                    // \SMSGlobal\Credentials::set('4516eec6a32e175c9dfcaf822a8bcc9b', '00830b14fd2e47ef6071ff185c2374c3');
                                    
                    // $sms = new \SMSGlobal\Resource\Sms();

                    // $response = $sms->sendToOne('88'.$request->phone, "Your verification code is : $code","First Call");
                    
                    // if( isset($response['messages'][0]['status']) ){
                        $customer = new Customer();
                        $customer->name = $request->name;
                        $customer->phone = $request->phone;
                        $customer->email = $request->email;
                        $customer->password = Hash::make($request->password);
                        $customer->last_active = date('Y-m-d H:i:s');
                        $customer->month  = Carbon::now()->month;
                        $customer->year  = Carbon::now()->year;
    
                        $customer->is_active = true;
                        $customer->is_otp_verified = false;
    
                        if( $customer->save() ){
                            $customer = DB::select(DB::raw("SELECT * FROM customers WHERE id = $customer->id"))[0];
                            return response()->json([
                                'status' => 'success',
                                'message' => 'A verification code send to your mobile',
                                'data' => $customer->phone
                            ],200); 
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

        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    }
    //reister function end


    //login function start
    public function login(Request $request){

        // validator
        $validator = Validator::make($request->all(),[
            "phone"       => "required|exists:customers,phone",
            "password"   => "required",
        ]);

        if( $validator->fails() ){
            return response()->json([
                'status' => 'error',
                'data' => $validator->errors()
            ],200); 
        }

        $customer = Customer::where("phone",$request->phone)->first();

        if( $customer->is_active == false ){
            return response()->json([
                'status' => 'error',
                'data' => 'Account deactivated'
            ],200); 
        }
        elseif( $customer->is_otp_verified == false ){
            $verify = new Verify();

            $code = rand(000000,999999);
            $verify->phone = $request->phone;
            $verify->code = $code;

            if( $verify->save() ){
                \SMSGlobal\Credentials::set('4516eec6a32e175c9dfcaf822a8bcc9b', '00830b14fd2e47ef6071ff185c2374c3');
                                    
                $sms = new \SMSGlobal\Resource\Sms();
    
                $response = $sms->sendToOne('88'.$request->phone, "Your verification code is : $code","First Call");
                
                if( isset($response['messages'][0]['status']) ){
                    return response()->json([
                        'status' => 'warning',
                        'message' => 'A verification code send to your mobile',
                        'data' => $customer->phone
                    ],200); 
                }
                else{
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Failed To Send SMS',
                    ],200); 
                }
            }

        }
        else{

            // login
            $credentials = request(['phone', 'password']);

            if (! $token = auth()->attempt($credentials)) {
                return response()->json(['status' => 'error', 'data' => 'Unauthorized'], 401);
            }

            return $this->respondWithToken($token, $customer);
        }

        
    }
    //login function end


    //resend_code function start
    public function resend_code(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                "phone"      => "required|exists:customers,phone",
            ]);

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' => $validator->errors()
                ],200); 
            }
            else{
                $verify = new Verify();

                $code = rand(000000,999999);
                $verify->phone = $request->phone;
                $verify->code = $code;

                if( $verify->save() ){
                    // get your REST API keys from MXT https://mxt.smsglobal.com/integrations
                    \SMSGlobal\Credentials::set('4516eec6a32e175c9dfcaf822a8bcc9b', '00830b14fd2e47ef6071ff185c2374c3');
                                    
                    $sms = new \SMSGlobal\Resource\Sms();

                    $response = $sms->sendToOne('88'.$request->phone, "Your verification code is : $code","First Call");
                    
                    if( isset($response['messages'][0]['status']) ){
                        
                        return response()->json([
                            'status' => 'success',
                            'message' => 'A verification code send to your mobile',
                        ],200); 
                        
                    }
                    else{
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Failed To Send SMS',
                        ],200); 
                    }

                    
                }
            }
        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    }
    //resend_code function end


    //verify  function start
    public function verify(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                "code" => "required|integer|min:5",
                "phone" => "required",
            ]);

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' => $validator->errors()
                ],200); 
            }
            else{
                $verify = Verify::where("code", $request->code)->where("phone", $request->phone)->select("code","phone","created_at")->first();

                if( $verify ){

                    $now_time = Carbon::now()->toTimeString();
                    $verification_time = date("H:i:s",strtotime($verify->created_at->toTimeString()) + 5*60);


                    if( $now_time > $verification_time ){
                        return response()->json([
                            'status' => 'error',
                            'data' => 'Code is expired. Resend it again'
                        ],200);
                    }
                    else{
                        $customer = Customer::where("phone", $request->phone)->first();

                        if( $customer ){
                            $customer->is_otp_verified = true;

                            if( $customer->save() ){
                                $verify->delete();
                                return response()->json([
                                    'status' => 'success',
                                    'message' => 'Verification successfully done',
                                    'data' => new CustomerResource($customer)
                                ],200); 
                            }
                        }
                        else{
                            return response()->json([
                                'status' => 'error',
                                'data' => 'No customer found with this phone number'
                            ],200);
                        }
                    }

                    

                }
                else{
                    return response()->json([
                        'status' => 'error',
                        'data' => 'Code is expired. Please try again'
                    ],200);
                }

            }
        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    }
    //verify  function end


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
            'expires_in' => auth()->factory()->getTTL() * 60,
            'data' => $customer
        ]);
    }
}
