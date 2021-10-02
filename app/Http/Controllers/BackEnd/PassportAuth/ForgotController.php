<?php

namespace App\Http\Controllers\BackEnd\PassAuth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Requests\ForgotRequest;
use Illuminate\Database\Eloquent\Builder;
use Mail;
use App\Mail\ForgotMail;

class ForgotController extends Controller
{
     public function forgotPage(){
         return view("Backend.adminAuth.forget");
     }

    //forgot password method..
    public function forgot(ForgotRequest $request){
       $email = $request->email;
        $user_search = DB::table('users')->where("email", $email)->first();
       if (is_null($user_search)){
           return response([
               "message"=>"Email Not Found"
           ], 200);
       }

        try {
            $token = rand(10, 100000);
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token
            ]);

            Mail::to($email)->send(new ForgotMail($token));

            return response([
                "message"=>"Reset Password link Send Your Mail Box"
            ], 200);

        }catch (\Exception $exception){
            return response([
                "message"=>$exception->getMessage()
            ],400);
        }


    }
}
