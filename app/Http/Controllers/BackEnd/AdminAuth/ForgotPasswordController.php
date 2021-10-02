<?php

namespace App\Http\Controllers\BackEnd\AdminAuth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotMail;
use App\Model\Admin;
use DB;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function adminForgetForm(){
        return view("Backend.adminAuth.forget");
    }

    public function adminForgetCheck(Request $request){
        $email = $request->email;
        $admins = Admin::where("email", $request->email)->first();
      if (is_null($email)){
          $notification=array(
              'message'=>'Enter Your Email',
              'alert-type'=>'error'
          );
          return Redirect()->back()->with($notification);
      }

      if (is_null($admins)){
          $notification=array(
              'message'=>'Email Not Found, Register First',
              'alert-type'=>'error'
          );
          return Redirect()->back()->with($notification);
      }else{
          try {
              $token = rand(10, 100000);
              DB::table('password_resets')->insert([
                  'email' => $email,
                  'token' => $token
              ]);

              Mail::to($email)->send(new ForgotMail($token, $email));

              $notification=array(
                  'message'=>'Reset Password link Send Your Mail Box',
                  'alert-type'=>'success'
              );

              return Redirect()->back()->with($notification);

          }catch (\Exception $exception){
              return response([
                  "message"=>$exception->getMessage()
              ],400);
          }

      }

    }


}
