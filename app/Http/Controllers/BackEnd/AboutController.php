<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use File;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest");
    }

    public function index(){
        $about =  DB::table("about")->get();
        return view("BackEnd.pages.about.index", compact("about"));
    }


    public function edit($id){
        $about =  DB::table("about")->where("id", $id)->first();
        return view("Backend.pages.about.edit", compact("about"));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:255',
            'title' => 'required',
            'details' => 'required',
            'profession' => 'required|max:255',
            'country' => 'required|max:255',
            'language' => 'required|max:255',
            'freelance' => 'required|max:255',
            'address' => 'required|max:255',
            'video_link' => 'required|max:255',
            'about_image' => 'image',
        ],[
                "name.required"=>"Name is Required",
                "title.required"=>"Title is Required",
                "details.required"=>"Details is  Required",
                "profession.required"=>"Profession is Required",
                "country.required"=>"Country is Required",
                "language.required"=>"Language is Required",
                "freelance.required"=>"Freelance is Required",
                "address.required"=>"Address is Required",
                "video_link.required"=>"Video is Required",
                "about_image.image"=>"Image Extension Must be: .jpg, .png, .jpeg, .gif",
            ]
        );

        $about = array();
        $about["name"]= $request->name;
        $about["title"]= $request->title;
        $about["details"]= $request->details;
        $about["profession"]= $request->profession;
        $about["country"]= $request->country;
        $about["language"]= $request->language;
        $about["freelance"]= $request->freelance;
        $about["address"]= $request->address;
        $about["video_link"]= $request->video_link;


        //Code For upload Header Image
        if($request->file('about_image')){
            $aboutImage = DB::table("about")->where('id', $id)->first();
            if (!is_null($aboutImage)) {
                if (File::exists('image/about/' . $aboutImage->image)) {
                    File::delete('image/about/' . $aboutImage->image);
                }
            }

            $mainImage = $request->file('about_image');
            $main_img = time().'.'. $mainImage->getClientOriginalExtension();
            $location = public_path('image/about/'.$main_img);
            Image::make($mainImage)->save($location);
            $about["image"] = $main_img;
        }

        DB::table("about")->where("id", $id)->update($about);

        $notification=array(
            'message'=>'Successfully Update',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
