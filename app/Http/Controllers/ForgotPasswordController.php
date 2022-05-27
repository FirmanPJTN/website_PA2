<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('auth.lupaPassword');
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
            $request->validate([
                'email' => 'required|email|exists:users',
            ]);

            $token = Str::random(64);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            Mail::send('email.forget-password-email', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                $message->subject('Reset Password');
            });

            return back()->with('message', 'We have emailed your password reset link!');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
         return view('auth.konfirmasiPassword', ['token' => $token]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
            $request->validate([
                'email' => 'required|email|exists:users',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required'
            ]);

            $update = DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();

            if(!$update){
                return back()->withInput()->with('error', 'Invalid token!');
            }

            $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

            // Delete password_resets record
            DB::table('password_resets')->where(['email'=> $request->email])->delete();

            return redirect('/login')->with('message', 'Your password has been successfully changed!');
      }
}
