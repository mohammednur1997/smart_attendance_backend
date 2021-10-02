<?php

namespace App\Http\Controllers\BackEnd\BackEndSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Mail;
use App\Mail\SendMail;

class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest");
    }
    //
    public function inbox(){
        $Allmail = DB::table("message")->get();
        return view("Backend.adminMail.inbox", compact("Allmail"));
    }

    public function compose(){
        return view("Backend.adminMail.compose");
    }

    public function viewMail(){
        return view("Backend.adminMail.viewMail");
    }

    public function send(Request $request){
        $email = $request->to;
        $message = $request->message;
        $subject = $request->subject;

        Mail::to($email)->send(new SendMail($message, $subject));

        $notification=array(
            'message'=>'Successfully Send The Message',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);
    }
}
