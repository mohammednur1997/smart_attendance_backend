<?php

namespace App\Http\Controllers\BackEnd\PassAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{

    public function loginPage(){
        return view("Backend.adminAuth.login");
    }
    //
    public function login(Request $request){

        try {
            if (Auth::attempt($request->only("email", "password"))) {
                $user = Auth::user();
               /* $token = $user->createToken('app')->accessToken;*/
                return Redirect()->Route("deshboard");
            }else{
                return json_encode( "Invalid Email And Password");
            }

        }catch(Exception $exception){
            return json_encode($exception->getMessage());
            }

    }

    public function registerPage(){
        return view("Backend.adminAuth.register");
    }

    public function register(Request $request){
        try {
            $user =  User::create([
                "first_name"=>$request->firstname,
                "last_name"=>$request->lastname,
                "username"=>$request->username,
                "gender"=>$request->gender,
                "email"=>$request->email,
                'password' => Hash::make($request->password)
            ]);

            $token = $user->createToken('app')->accessToken;

            if ($user){
                return json_encode( "Successfully Register a New User");
            }else{
                return json_encode( "Failed to Register");
            }

        }catch (Exception $exception){
            return json_encode( $exception->getMessage());
        }

    }

    public function users(){
        $users_information = Auth::user();
         return $users_information;
    }

}
