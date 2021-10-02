<?php

namespace App\Http\Controllers\BackEnd\PassAuth;

use App\Http\Controllers\Controller;

use App\Http\Requests\ResetRequest;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class ResetController extends Controller
{
    //reset Password method....
    public function resetPassword(ResetRequest $request){
         $email = $request->email;
         $token = $request->token;
         $password = Hash::make($request->password);

        $user =   DB::table('users')->where("email", $email)->first();
        $token =  DB::table('password_resets')->where("token", $token)->first();


        if (!$token){
            return response([
                "message"=>"Token Not Match"
            ], 200);
        }

        if (!$user){
            return response([
                "message"=>"User Email Not Found"
            ], 200);
        }else{
            DB::table("users")->where('email', $email)->update(["password" => $password]);
            DB::table("password_resets")->where('email', $email)->delete();
            return response([
                "message"=>"Password Change SuccessFully"
            ], 200);
        }

    }


}
