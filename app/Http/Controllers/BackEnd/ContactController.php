<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest");
    }
        public function index(){
              $allMsg = DB::table("message")->get();
            return view("BackEnd.pages.Messages.index", compact("allMsg"));
        }

        public function sendMsg(Request $request){

            /*$request->validate([
                'contact_name' => 'required|max:255',
                'contact_phone' => 'required|max:255',
                'contact_email' => 'required|max:255',
                'contact_subject' => 'required|max:255',
                'contact_message' => 'required',
            ],[
                    "contact_name.required"=>"Name is Required",
                    "contact_phone.required"=>" Phone Number is Required",
                    "contact_email.required"=>" Email is Required",
                    "contact_subject.required"=>"Please Select a Subject",
                    "contact_message.required"=>"Please write some Message",
                ]
            );*/

            $contact = array();
            $contact["name"]= $request->name;
            $contact["phone"]= $request->phone;
            $contact["email"]= $request->email;
            $contact["category"]= $request->subject;
            $contact["message"]= $request->message;

            $result = DB::table("message")->insert($contact);
            if ($result){
                return json_encode( "Your message has been sent.We will contact you as soon as possible.");
            }else{
                return json_encode( "Failed to insert data");
            }

        }

        public function update(Request $request, $id){

        }

        public function ReplyMsg(Request $request, $id){

        }
}
