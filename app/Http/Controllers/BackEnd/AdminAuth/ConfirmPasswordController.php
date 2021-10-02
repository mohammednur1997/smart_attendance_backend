<?php

namespace App\Http\Controllers\BackEnd\AdminAuth;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
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
        $this->middleware('auth');
    }*/

    public function adminConfirmForm(){
        return view("Backend.adminAuth.confirmPass");
    }

    public function adminConfirmForgetCheck(Request $request){

        $admins = Admin::where("email", $request->email)->first();

        if (is_null($admins)){
            $notification=array(
                'message'=>'Email not found',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }


       $pin =  DB::table('password_resets')->where("token", $request->pin)->first();
       if (is_null($pin)){
           $notification=array(
               'message'=>'Pin Not Match',
               'alert-type'=>'error'
           );
           return Redirect()->back()->with($notification);
       }else{
           DB::table("admins")->where("email", $request->email)->update(["password" => Hash::make($request->password)]);
           DB::table("password_resets")->where("email", $request->email)->delete();


           $notification=array(
               'message'=>'Successfully Change the password',
               'alert-type'=>'success'
           );
           return Redirect()->back()->with($notification);
       }

      /*  $status = $admins->status;
        if ($status !== 1){
            $notification=array(
                'message'=>'Talk With Your Super Admin to active your account',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }*/




    }
}
