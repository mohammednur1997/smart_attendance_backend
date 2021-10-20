<?php

namespace App\Http\Controllers\ApiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    //
    public function login(Request $request){

        try {
            if (Auth::attempt($request->only("email", "password"))) {
                $user = Auth::user();
                $token = $user->createToken('app')->accessToken;
                return response([
                    "message" => "Successfully Login",
                    "user" => $user,
                    "token" => $token
                ], 200);
            }

        }catch(Exception $exception){
                return response([
                    "message"=>$exception->getMessage()
                ],200);
            }

            return response([
                "result"=> "fail",
                "message"=>"Invalid Email And Password"
            ],200);

    }

    public function register(RegisterRequest $request){
        try {
            $user =  User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                'password' => Hash::make($request->password)
            ]);

            $token = $user->createToken('app')->accessToken;

            return response([
                "message"=>"Register SuccessFully Complete",
                "user"=>$user,
                "token"=>$token
            ], 200);

        }catch (Exception $exception){
            return response([
                "message"=>$exception->getMessage()
            ],400);
        }

    }

    public function users(){
        $users_information = Auth::user();
         return $users_information;
    }

}
