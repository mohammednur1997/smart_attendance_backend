<?php

namespace App\Http\Controllers\BackEnd\BackEndSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use DB;

class SocialLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest");
    }
    //
    public function loginPage()
    {
        return view("Backend.adminAuth.login");
    }

    public function loginSocial()
    {
        return Socialite::driver('github')->redirect();
    }

    public function getData(){
        $user = Socialite::driver('github')->user();
        $token = $user->token;
        $user_id = $user->getId();
        $nick_name = $user->getNickname();
        $name = $user->getName();
        $email = $user->getEmail();
        $avatar = $user->getAvatar();

        $loginCheck = DB::table("users")->where("social_id", $user_id)->count();
        if ($loginCheck == 0){
            DB::table("users")->insert(["social_id" => $user_id, "name"=>$name, "email"=>$email]);
            return redirect("/deshboard");
        }else{
            return redirect("/deshboard");
        }

    }



}
