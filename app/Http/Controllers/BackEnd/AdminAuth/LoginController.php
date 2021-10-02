<?php

namespace App\Http\Controllers\BackEnd\AdminAuth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }*/




    public function loginFormPage(){

        if (Auth::guard("admin")->check()) {
            return redirect()->route("deshboard");
        }else{
            return view("Backend.adminAuth.login");
        }


    }

    public function LoginCheck(Request $request){

        $admins = Admin::where("email", $request->email)->first();

        if (is_null($admins)){
            $notification=array(
                'message'=>'Email not found',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }

        $status = $admins->status;
        if ($status !== 1){
            $notification=array(
                'message'=>'Talk With Your Super Admin to active your account',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }


        if (Auth::guard('admin')->attempt(["email"=>$request->email, "password"=>$request->password, 'status'=>1], $request->remember)){
        return redirect()->intended(route('deshboard'));
        }else{
            $notification=array(
                'message'=>'Invalid Password',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }

    }

    // logout Form admin guard...
    public function logout(Request $request){
        Auth::guard("admin")->logout();
        return redirect()->route("admin.login");
    }
}
