<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FooterController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest");
    }
    public function index(){
        $footer =  DB::table("footer")->get();
        return view("BackEnd.pages.footer.index", compact("footer"));
    }


    public function edit($id){
        $footer =  DB::table("footer")->where("id", $id)->first();
        return view("Backend.pages.footer.edit", compact("footer"));
    }

    public function update(Request $request, $id){
        $request->validate([
            'mobile' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required',
            'facebook' => 'required|max:255',
            'github' => 'required|max:255',
            'youtube' => 'required|max:255',
            'instragram' => 'required|max:255',
            'cradit' => 'required|max:255',

        ],[
                "mobile.required"=>"Mobile Number is Required",
                "email.required"=>"Email is Required",
                "address.required"=>"Address is Required",
                "facebook.required"=>"Facebook is Required",
                "github.required"=>"Github is Required",
                "youtube.required"=>"Youtube  Required",
                "instragram.required"=>"Instragram is Required",
                "cradit.required"=>"Footer Cradit is Required",
            ]
        );

        $footer = array();
        $footer["mobile"]= $request->mobile;
        $footer["email"]= $request->email;
        $footer["address"]= $request->address;
        $footer["facebook_url"]= $request->facebook;
        $footer["github_link"]= $request->github;
        $footer["youtube_url"]= $request->youtube;
        $footer["instragram_link"]= $request->instragram;
        $footer["footer_cradits"]= $request->cradit;

        DB::table("footer")->where("id", $id)->update($footer);

        $notification=array(
            'message'=>'Successfully Update Footer',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);
    }
}
