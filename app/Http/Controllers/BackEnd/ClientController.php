<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use File;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest");
    }

    public function index(){
        $client =  DB::table("clients")->get();
        return view("BackEnd.pages.clients.index", compact("client"));
    }

    public function create(){
        return view("BackEnd.pages.clients.create");
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'company' => 'required|max:255',
            'comment' => 'required|max:255',
            'cl_image' => 'image',
        ],[
                "name.required"=>"Client Name is Required",
                "company.required"=>"Client Company is Required",
                "comment.required"=>"Client Comment is Required",
                "cl_image.image"=>"Main Image Extension Must be: .jpg, .png, .jpeg, .gif",
            ]
        );

        $client = array();
        $client["name"]= $request->name;
        $client["company"]= $request->company;
        $client["comment"]= $request->comment;

        //insert Member image
        if ($request->cl_image){
            $bigImage = $request->file('cl_image');
            $big_img = time().'.'. $bigImage->getClientOriginalExtension();
            $location = public_path('image/clients/'.$big_img);
            Image::make($bigImage)->save($location);
            $client['image'] = $big_img;

        }
        DB::table("clients")->insert($client);
        $notification=array(
            'message'=>'Successfully Added New Team Member',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($id){
        $client =  DB::table("clients")->where("id", $id)->first();
        return view("Backend.pages.clients.edit", compact("client"));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:255',
            'company' => 'required|max:255',
            'comment' => 'required|max:255',
            'cl_image' => 'image',
        ],[
                "name.required"=>"Client Name is Required",
                "company.required"=>"Client Company is Required",
                "comment.required"=>"Client Comment is Required",
                "cl_image.image"=>"Main Image Extension Must be: .jpg, .png, .jpeg, .gif",
            ]
        );

        $client = array();
        $client["name"]= $request->name;
        $client["company"]= $request->company;
        $client["comment"]= $request->comment;


        if($request->file('cl_image')){
            $smallImage = DB::table("clients")->where('id', $id)->first();
            if (!is_null($smallImage)) {
                if (File::exists('image/clients/' . $smallImage->image)) {
                    File::delete('image/clients/' . $smallImage->image);
                }
            }

            $mainImage = $request->file('cl_image');
            $main_img = time().'.'. $mainImage->getClientOriginalExtension();
            $location = public_path('image/clients/'.$main_img);
            Image::make($mainImage)->save($location);
            $client["image"] = $main_img;
        }

        DB::table("clients")->where("id", $id)->update($client);

        $notification=array(
            'message'=>'Successfully Update The Client',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);
    }


    public function delete($id){
        $SmallImage = DB::table("clients")->where('id', $id)->first();

        if (!is_null($SmallImage)){
            if (File::exists('image/clients/' . $SmallImage->image)) {
                File::delete('image/clients/' . $SmallImage->image);
            }
        }

        DB::table("clients")->where("id", $id)->delete();

        $notification=array(
            'message'=>'Successfully Delete This Clients',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
