<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserModule\SuperAdmin;
use App\Models\UserModule\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function getEmail()
    {
        return view('auth.password_email');
    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        try{
            if( SuperAdmin::where('email', $request->email)->first() ){
                $token = Str::random(60);
                DB::table('password_resets')->insert(
                    ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
                );
                $email = $request->email;
                Mail::send('auth.verify', ['token' => $token, 'email' => $email], function ($message) use ($request) {
                    $message->from(mail_from());
                    $message->to($request->email);
                    $message->subject('Reset Password Notification');
                });
                return response()->json(['success' => 'We send you a password reset link in your given email address'], 200);
    
            }
            elseif( User::where('email', $request->email)->first() ){
                $token = Str::random(60);
                DB::table('password_resets')->insert(
                    ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
                );
                $email = $request->email;
                Mail::send('auth.verify', ['token' => $token, 'email' => $email], function ($message) use ($request) {
                    $message->from(mail_from());
                    $message->to($request->email);
                    $message->subject('Reset Password Notification');
                });
                return response()->json(['success' => 'We send you a password reset link in your given email address'], 200); 
            }else{
                return response()->json(['error' => 'Invalid Email Address'], 200);
            }
        }
        catch( Exception $e ){
            return response()->json(['error' => $e->getMessage()], 200);
        }
        
    }

    public function getPassword($token, $email, Request $request)
    {
        $all_token = DB::table('password_resets')->get();
        foreach ($all_token as $single_token) {
            if ($single_token->token == $token) {
                return view('auth.reset', ['token' => $token, 'email' => $email]);
            }
        }
        $request->session()->flash('failed', 'Session Timeout. Please send reset password link again');

        return redirect()->route('get.email');
    }

    public function reset_password(Request $request, $email)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        if( SuperAdmin::where('email', $request->email)->first() ){
            $user = SuperAdmin::where('email', $email)->first();
            $user->password = Hash::make($request->password);
            if ($user->save()) {
                Auth::logout();
                $request->session()->flash('success', 'Your password is updated successfully');

                return redirect()->route('login.show');
            }
        }
        elseif( User::where('email', $request->email)->first() ){
            $user = User::where('email', $email)->first();
            $user->password = Hash::make($request->password);
            if ($user->save()) {
                Auth::logout();
                $request->session()->flash('success', 'Your password is updated successfully');

                return redirect()->route('login.show');
            }
        }
        else{
            $request->session()->flash('failed','Invalid Email Address');
            return back();
        }

        
    }
}