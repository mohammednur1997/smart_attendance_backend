<?php

namespace App\Http\Controllers\BackEnd\BackEndSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Model\Admin;
use App\User;
use DB;
use Image;
use File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest");
    }
    //
    public function index(){
        $admin = Admin::all();
        return view("Backend.adminUser.user", compact("admin"));
    }
    public function create(){
        $role = Role::all();
        return view("Backend.adminUser.create", compact("role"));
    }



    public function store(Request $request){
        $request->validate([
            'f_name' => 'required|max:255',
            'l_name' => 'required|max:255',
            'email' => 'required|unique:admins',
            'gender' => 'required|max:255',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'username' => 'required|max:255',
            'role' => 'required',
            'status' => 'required',
            'image' => 'image',
        ],[
                "f_name.required"=>"First Name is Required",
                "l_name.required"=>"last Name is Required",
                "email.required"=>"Email Name is Required",
                "gender.required"=>"Gender is Required",
                "password.required"=>"Password is Required",
                "password_confirmation.required"=>"Confirm Password is Required",
                "username.required"=>"Username is Required",
                "role.required"=>"Role is Required",
                "status.required"=>"Status is Required",
                "image.image"=>"Main Image Extension Must be: .jpg, .png, .jpeg, .gif",
            ]
        );

        $admin = new Admin();
        $admin->first_name= $request->f_name;
        $admin->last_name= $request->l_name;
        $admin->email= $request->email;
        $admin->gender= $request->gender;
        $admin->password=Hash::make($request->password);
        $admin->username= $request->username;
        $admin->status= $request->status;
        $admin->ip= $request->ip();

        //insert Member image
        if ($request->image){
            $bigImage = $request->file('image');
            $big_img = time().'.'. $bigImage->getClientOriginalExtension();
            $location = public_path('assets/images/user/'.$big_img);
            Image::make($bigImage)->save($location);
            $admin->image = $big_img;
        }

        $admin->save();

        if($request->role){
            $admin->assignRole($request->role);
        }

        $notification=array(
            'message'=>'Successfully Create New User',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($id){
        $role = Role::all();
        $admin = Admin::find($id);
        return view("Backend.adminUser.edit", compact("admin", "role"));
    }

    public function update(Request $request, $id){
        $request->validate([
            'f_name' => 'required|max:255',
            'l_name' => 'required|max:255',
            'email' => 'required|unique:admins,email,'.$id,
            'gender' => 'required|max:255',
            'password' => 'nullable|confirmed',
            'username' => 'required|max:255',
            'role' => 'required',
            'status' => 'required',
            'image' => 'image',
        ],[
                "f_name.required"=>"First Name is Required",
                "l_name.required"=>"last Name is Required",
                "email.required"=>"Email Name is Required",
                "gender.required"=>"Gender is Required",
                "username.required"=>"Username is Required",
                "role.required"=>"Role is Required",
                "status.required"=>"Status is Required",
                "image.image"=>"Main Image Extension Must be: .jpg, .png, .jpeg, .gif",
            ]
        );

        $admin = Admin::find($id);
        $admin->first_name= $request->f_name;
        $admin->last_name= $request->l_name;
        $admin->email= $request->email;
        $admin->gender= $request->gender;

        if ($request->password){
            $admin->password = Hash::make($request->password);
        }

        $admin->username= $request->username;
        $admin->status= $request->status;

        //insert User image
        if ($request->image){
            $adminImage = DB::table("admins")->where('id', $id)->first();
            if (!is_null($adminImage)) {
                if (File::exists('assets/images/user/' . $adminImage->image)) {
                    File::delete('assets/images/user/' . $adminImage->image);
                }
            }

            $bigImage = $request->file('image');
            $big_img = time().'.'. $bigImage->getClientOriginalExtension();
            $location = public_path('assets/images/user/'.$big_img);
            Image::make($bigImage)->save($location);
            $admin->image = $big_img;
        }

        $admin->save();

        $admin->roles()->detach();
        if($request->role){
            $admin->assignRole($request->role);
        }

        $notification=array(
            'message'=>'Successfully Update User',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function destroy($id){
        $admin = Admin::find($id);
        if (!is_null($admin)){
            if (File::exists('assets/images/user/' . $admin->image)) {
                File::delete('assets/images/user/' . $admin->image);
            }
            $admin->roles()->detach();
            $admin->delete();
        }

        $notification=array(
            'message'=>'Successfully Delete the User',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

}
