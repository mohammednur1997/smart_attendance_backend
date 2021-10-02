<?php

namespace App\Http\Controllers\BackEnd\AdminAuth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

   /* public function __construct()
    {
        $this->middleware('guest');
    }*/

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function adminRegisterForm(){
        return view("Backend.adminAuth.register");
    }

    public function adminRegisterCheck(Request $request){

        $checkEmail = Admin::where('email', $request->email)->first();
        if (!is_null($checkEmail)){
            $notification=array(
                'message'=>'Someone already register the email',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }

        $admin = new Admin();
        $admin->first_name = $request->firstname;
        $admin->last_name = $request->lastname;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->gender = $request->gender;
        $admin->status = 2;
        $admin->save();

        return Redirect()->route("admin.login");

    }

}
